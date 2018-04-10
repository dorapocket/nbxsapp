<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>
<body>
<?php
include('simple_html_dom.php');
$ch = curl_init();
$timeout = 5;
$targeturl='http://www.nbxiaoshi.net/news.new.asp';
curl_setopt ($ch, CURLOPT_URL, $targeturl);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$file_contents=curl_exec($ch);
curl_close($ch);
$i=0;
$k=0;
$m=0;$pic=0;$tit=1;
$picarray=array();
$titarray=array();
$html = new simple_html_dom();
$html->load(yang_gbk2utf8($file_contents));
 foreach($html->find('img') as $img){
 $i=$i+1;
  $imgsrc=$img->src;
if($i>7 && $i<12){
echo $pic;
  $picarray[$pic]=$imgsrc;
  $pic=$pic+1;
}
}
echo '<img src=http://www.nbxiaoshi.net/'.$picarray[3].'><br>';



foreach($html->find('li[class=current]') as $li){
  $litext=$li->innertext;
  $k=$k+1;
if($k<2){
$titarray[0]=$litext;
 echo $litext.'<br>';
}
}
foreach($html->find('li[class=normal]') as $li){
  $litext=$li->innertext;
  $m=$m+1;
if($m<4){
 echo $litext.'<br>';
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
</body>