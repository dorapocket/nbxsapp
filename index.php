<?php
/**
 * Created by PhpStorm.
 * User: robotlab
 * Date: 2018/3/3
 * Time: 10:04
 */


/* 获取白板内容和超链接

include('simple_html_dom.php');
$ch = curl_init();
$timeout = 5;
curl_setopt ($ch, CURLOPT_URL, 'http://www.nbxiaoshi.net/Board.asp');
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$a =curl_exec($ch);
curl_close($ch);
$file_contents=yang_gbk2utf8($a);
#echo $file_contents;
$itemarray=array();
$itemhrefarray=array();

$html = new simple_html_dom();
$html->load($file_contents);
$i=0;
$itemcount=1;
foreach($html->find('a[class=class]') as $item) {
     $itemsel=$item->innertext;
     $hrefsel=$item->href;
     $i=$i+1;
if($i>4){
        $itemarray[$itemcount]=$itemsel;
        $itemhrefarray[$itemcount]=$hrefsel;
        echo '<a href="http://www.nbxiaoshi.net/'.$itemhrefarray[$itemcount].'">'.$itemarray[$itemcount].'</a>';
        echo '<br>';
        $itemcount=$itemcount+1;
        
 }
}*/

/*获取某白板内文字
include('simple_html_dom.php');
$ch = curl_init();
$timeout = 5;
curl_setopt ($ch, CURLOPT_URL, 'http://www.nbxiaoshi.net/Board_news.asp?ID=14192');
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$a =curl_exec($ch);
curl_close($ch);
$file_contents=yang_gbk2utf8($a);
$html = new simple_html_dom();
$html->load($file_contents);
foreach($html->find('p[align=left]') as $para) {
     $parain=$para->innertext;
     echo '<p>'.$parain.'</p>';
}
*/


/*校园动态板块和图片获取
include('simple_html_dom.php');
$ch = curl_init();
$timeout = 5;
curl_setopt ($ch, CURLOPT_URL, 'http://www.nbxiaoshi.net/bigclass.dtl.asp?BigClassId=31');
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$a =curl_exec($ch);
curl_close($ch);
$i=0;
$itemcount=0;
$itemarray=array();
$itemhrefarray=array();
$imgsrc=array();
$file_contents=yang_gbk2utf8($a);
$html = new simple_html_dom();
$html->load($file_contents);
foreach($html->find('a[target=_blank]') as $news) {
     $i=$i+1;
     $newstitle=$news->title;
     $newshref=$news->href;
if(($i>28)and($i<43)){
 $itemcount=$itemcount+1;
 $itemarray[$itemcount]=$newstitle;
 $itemhrefarray[$itemcount]=$newshref;
     echo $itemarray[$itemcount];
      echo $itemhrefarray[$itemcount];
echo '<br>';
}
}
$imgcount=0;
foreach($html->find('img[width=140]') as $imgs) {
 $imgsrcst=$imgs->src;
 $imgcount=$imgcount+1;
 $imgsrc[$imgcount]='http://www.nbxiaoshi.net'.$imgsrcst;
 echo $imgsrc[$imgcount];
}*/







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