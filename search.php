<?php

function querysearch($name){
$name=preg_replace('~[^\p{M}\w]+~u', '-', $name);
$name=strtolower($name);
$name=urlencode($name);
$name = preg_replace('/-$/', '', $name);
return $name;
}
$q = querysearch(strip_tags($_GET['q']));
$q_str = strlen(md5(urldecode($q)));
if(!empty($_GET['q'])){
$url='/'.substr(md5(urldecode($q)),$q_str-7,$q_str).'/'.querysearch(strip_tags($_GET['q'])).'.html';
}else{
$url='/'; }

header('location:'.$url.'');
?>
