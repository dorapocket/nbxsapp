

<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>
<body>
<?php
include('simple_html_dom.php');
$ch = curl_init();
$timeout = 5;
$page=$_GET["p"];
$targeturl='http://www.nbxiaoshi.net/newest.asp?page='.$page;
curl_setopt ($ch, CURLOPT_URL, $targeturl);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$a =curl_exec($ch);
curl_close($ch);
$file_contents=yang_gbk2utf8($a);
$itemarray=array();
$itemhrefarray=array();
$html = new simple_html_dom();
$html->load($file_contents);
$i=0;
$itemcount=1;
foreach($html->find('a[class=middle]') as $item) {
     $itemsel=$item->innertext;
     $hrefsel=$item->href;
     $i=$i+1;
    if($i>9){
        $itemarray[$itemcount]=$itemsel;
        $itemhrefarray[$itemcount]=$hrefsel;
        echo '<a href="http://www.nbxiaoshi.net/'.$itemhrefarray[$itemcount].'">'.$itemarray[$itemcount].'</a><br>';
        $itemcount=$itemcount+1;        
 }
}

function yang_gbk2utf8($str){ 
    $charset = mb_detect_encoding($str,array('UTF-8','GBK','GB2312')); 
    $charset = strtolower($charset); 
    if('cp936' == $charset){ 
        $charset='GBK'; 
    } 
    if("utf-8" != $charset){ 
        $str = iconv($charset,"UTF-8//IGNORE",$str); 
    } 
    return $str; 
}
?>