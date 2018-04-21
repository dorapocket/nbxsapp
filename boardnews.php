<?php
$ch = curl_init();
$timeout = 5;
$title=null;
$id=$_GET["id"];
$targeturl='http://www.nbxiaoshi.net/Board_news.asp?ID='.$id;
curl_setopt ($ch, CURLOPT_URL, $targeturl);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$a =curl_exec($ch);
curl_close($ch);
$file_contents=gbk2utf8($a);
#echo $file_contents;
$pa=0;
$html = new simple_html_dom();
$html->load($file_contents);
$i=0;
$itemcount=1;
foreach($html->find('strong') as $tit) {
     $title=$tit->innertext;
}
foreach($html->find('td[id=fontzoom]') as $para) {
     $paragraph=$para->innertext;
}

echo 'title:'.$title;
echo str_replace("/ewebeditor","http://www.nbxiaoshi.net/ewebeditor",$paragraph);


function gbk2utf8($str){ 
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
