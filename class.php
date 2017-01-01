<?php
/**
 * Class _bursaspor-haberleri-bot
 *
 * @author  Fatih Soysal
 * @web     http://www.fatihsoysal.com
 * @mail    fatihsoysal@outlook.com
 */
error_reporting(0); 
$site="http://olay.com.tr/bursaspor";
$icerik=file_get_contents($site);
// ul ayırma
$icerik=explode('<ul id="output">',$icerik); 
$icerik=explode('</ul>',$icerik[1]);
$ul=$icerik[0];

for($sayi = 1; $sayi <= 15; $sayi++) {

//li ayırma

$li=explode('<li id="'.$sayi.'">',$ul); 
$li=explode('</li>',$li[1]);
$liA=$li[0];

// a ayırma
$aa=explode('title="',$liA); 
$aa=explode('"',$aa[1]);
$title=$aa[0]; //get Title

if ($title!="") {

$aa2=explode('src="',$liA); 
$aa2=explode('"',$aa2[1]);
$image=$aa2[0]; //get Image
$image = "http://olay.com.tr".$image."";

$aa3=explode('href="',$liA); 
$aa3=explode('"',$aa3[1]);
$link=$aa3[0]; //get Link
$link = "http://olay.com.tr".$link."";

//haber detayına ulaşma
$icerikDetay=file_get_contents($link);
$icerikDetayUst=explode('<div class="haber-metin" style="font-weight:bold; margin-top:5px; size:17px;">',$icerikDetay); 
$icerikDetayUst=explode('</div>',$icerikDetayUst[1]);
$ustYazi=$icerikDetayUst[0]; //get detay giriş yazısı

$icerikDetayAlt=explode('<div id="iceriks">',$icerikDetay); 
$icerikDetayAlt=explode('</div>',$icerikDetayAlt[1]);
$altYazi=$icerikDetayAlt[0]; //get detay giriş yazısı

echo $title;
echo "<br>";
echo '<img src="'.$image.'"/>';
echo "<br>";
echo $ustYazi;
echo "<br>";
echo $altYazi;
echo "<hr>";
}
}
?>
