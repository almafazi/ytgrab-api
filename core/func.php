<?php
error_reporting(0);
function ngegrab($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$uaa = $_SERVER['HTTP_USER_AGENT'];
    curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: $uaa");

    return curl_exec($ch);
}

function caplok($url)
{
$btext = rand(0,100000);
$ua = 'Mozilla/5.0' . $btext;
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_USERAGENT,$ua);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$exec=curl_exec($ch);
return $exec;
}

function descript($teks) {
     $teks = str_replace('"', "", $teks);
     $teks = str_replace("'", "", $teks);
     $teks = trim(preg_replace('/\s\s+/', ' ', $teks));
     $teks = substr($teks,0,110);
   return $teks;
}

function format_jam($t) {
$tm = str_replace('PT','',$t);
$tm = str_replace('H',':',$tm);
$tm = str_replace('M',':',$tm);
$tm = str_replace('S','',$tm);
return $tm;}

function queryname($name){
$name=preg_replace('~[^\p{M}\w]+~u', ' ', $name);
$name=strtolower($name);
$name=ucwords($name);
return $name;
}
function querylink($name){
$name=preg_replace('~[^\p{M}\w]+~u', '-', $name);
if($name[0] == '-'){$name = ltrim($name, '-');}
$name=strtolower($name);
return $name;
}
function querysearch($name){
$name=preg_replace('~[^\p{M}\w]+~u', '-', $name);
if($name[0] == '-'){$name = ltrim($name, '-');}
$name=strtolower($name);
$name=urlencode($name);
$name = preg_replace('/-$/', '', $name);
return $name;
}

function potong($content,$start,$end){
if($content && $start && $end) {
$r = explode($start, $content);
if (isset($r[1])){
$r = explode($end, $r[1]);
return $r[0];}
return '';}}

function ilangin($url) {
    $url = strtolower($url);
    $url = str_replace('official music video', ' ', $url);
    $url = str_replace('official video music', ' ', $url);
    $url = str_replace('[', ' ', $url);
    $url = str_replace(']', ' ', $url);
    $url = str_replace(')', ' ', $url);
    $url = str_replace('(', ' ', $url);
    $url = str_replace('official music', '', $url);
    $url = str_replace('official video', '', $url);
    $url = str_replace('official audio', '', $url);
    $url = str_replace('official', '', $url);
    return ucwords($url);
}

function tm($content,$start,$end){
if($content && $start && $end) {
$r = explode($start, $content);
if (isset($r[1])){
$r = explode($end, $r[1]);
return $r[0];}
return '';}}

function format_times($t,$f=':'){
if($t < 3600){
return sprintf("%02d%s%02d", floor($t/60)%60, $f, $t%60);
}else{
return sprintf("%02d%s%02d%s%02d", floor($t/3600), $f, ($t/60)%60, $f, $t%60);
}
}

function format_time($stamp) {
$tm = str_replace(array("PT","M","S"), array("",":",""),$stamp);
$exploded_string = explode(":",$tm);
$tm = sprintf("%02d", $exploded_string[0]).":".sprintf("%02d", $exploded_string[1]);
return $tm;}

function dateyt($date)
{
$date = substr($date,0,10);
$date = explode('-',$date);
/* $mn = date('F',mktime(0,0,0,$date[1])); */
$dates=''.$date[0].'-'.$date[1].'-'.$date[2].'';
return $dates;
}
/*
function dateyts($dates)
{
$dates = str_replace('January', '-01-', $dates);
$dates = str_replace('February', '-02-', $dates);
$dates = str_replace('March', '-03-', $dates);
$dates = str_replace('April', '-04-', $dates);
$dates = str_replace('May', '-05-', $dates);
$dates = str_replace('June', '-06-', $dates);
$dates = str_replace('July', '-07-', $dates);
$dates = str_replace('August', '-08-', $dates);
$dates = str_replace('September', '-09-', $dates);
$dates = str_replace('October', '-10-', $dates);
$dates = str_replace('November', '-11-', $dates);
$dates = str_replace('December', '-12-', $dates);
$dates = str_replace(' ', '', $dates);
return $dates;
}*/


function ngegrabz($url){
ini_set("user_agent","Opera/9.80 (J2ME/MIDP; Opera Mini/4.2 19.42.55/19.892; U; en) Presto/2.5.25");
$grab = @fopen($url, 'r');
$contents = "";
if ($grab) {
while (!feof($grab)) {
$contents.= fread($grab, 8192);
}
fclose($grab);
}
return $contents;
}

function size($size) {
  if ($size < 1024) {
    return $size . ' N/A';
  }
  else {
    $size = $size / 1024;
    $units = ['KB', 'MB', 'GB', 'TB'];
    foreach ($units as $unit) {
      if (round($size, 2) >= 1024) {
        $size = $size / 1024;
      }
      else {
        break;
      }
    }
    return round($size, 2) . ' ' . $unit;
  }
}

function ptk($n) {
$n = str_replace("'","",$n);
$n = str_replace('"','',$n);
return $n;
}

function write_to_file($q)
{$filename = 'sitemap.txt';
$fh = fopen($filename, "a");
if(flock($fh, LOCK_EX))
{fwrite($fh, $q);
flock($fh, LOCK_UN);}
fclose($fh);}


$keying = true;
while($keying) {
$kuery = array('8a53e758166722bb53f30fbfb697416e','fDoItMDbsbZz8dY16ZzARCZmzgHBPotA','b0c1e4b77f4548b24ddb64893bcea2dc');
$que = $kuery[array_rand($kuery)];
$json = json_decode(ngegrab('http://api.soundcloud.com/tracks.json?client_id='.$que.''));
  if($json) {
    $clientid= $que;
    $keying = false;
  } else { $keying = true; }
}
include 'api.php';

?>
