<?

$div = "|#|";
$dat='last.txt';

$fp = fopen($dat, 'r');
$count = fgets($fp);
fclose($fp);
$cari = 'q='.$q;
$cari = str_replace('-', ' ',$cari);

$data = explode($div, $count);
if (in_array($cari, $data)) {
$tulis = implode($div, $data);

}
else {
$data = explode($div, $count);
$tulis = $data[1].''.$div.''.$data[2].''.$div.''.$data[3].''.$div.''.$data[4].''.$div.''.$data[5].''.$div.''.$data[6].''.$div.''.$data[7].''.$div.''.$data[8].''.$div.''.$data[9].''.$div.''.$data[10].''.$div.''.$data[11].''.$div.''.$data[12].''.$div;
$tulis .= $cari;

}

if (!empty($q)){
$masuk=fopen($dat, 'w');
fwrite($masuk,$tulis);
fclose($masuk);
}

$div = '|#|';
$search = 'last.txt';

$fa = fopen($search, 'r');
$b = fgets($fa);
fclose($fa);

echo '<h4 class="widget-title"><span class="ktz-blocktitle">Last Search</span></h4>
<ul>
';

$c = explode($div, $b);
foreach(array_reverse($c) as $d){
$lastsearch = explode('q=',$d);
$linklast12 = trim($lastsearch[1]);
$linklast1 = mb_substr($linklast12,0,50,'UTF-8');
$linklast = querysearch($linklast12);

$q_str = strlen(md5(urldecode($linklast)));
$q_str = substr(md5(urldecode($linklast)),$q_str-7,$q_str);
echo '
<li><span class="glyphicon glyphicon-download"></span> <a title="'.$linklast1.'" href="/'.$q_str.'/'.$linklast.'.html">'.ucwords($linklast1).'</a>..
</li>';
}
echo '</ul>';

?>
