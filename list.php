<?php

include 'core/func.php';


if(!$_GET['q'] && !$_GET['key']) {
header('Location:/');
}
$q = strip_tags($_GET['q']);
$key = strip_tags($_GET['key']);

$q_str = strlen(md5(urldecode($q)));
$q_str = substr(md5(urldecode($q)),$q_str-7,$q_str);

if($key != $q_str){
header('Location:/');  
}


if($_GET['order']){
$order = $_GET['order'];
} else {
$order='relevance';
}
$uhuk = queryname($q);

if(strlen($_GET['page']) >1 || $_GET['order'])
{
$yesPage=$_GET['page'];
$ngindek = 'noindex';
$kanon = '<link rel="canonical" href="http://'.$_SERVER['HTTP_HOST'].'/'.$key.'/'.$q.'.html" />';
}
else
{
$yesPage='';
$ngindek = 'index,follow';
$kanon = '<link rel="canonical" href="http://'.$_SERVER['HTTP_HOST'].'/'.$key.'/'.$q.'.html" />';
}

$grab = ngegrab('https://www.googleapis.com/youtube/v3/search?part=snippet&order=relevance&q='.querylink($q).'&key='.$que.'&pageToken='.$yesPage.'&maxResults=10&type=video');
                        
$jason = json_decode($grab);
$nextpage=$jason->nextPageToken;
$prevpage=$jason->prevPageToken;
if(!$jason->items[0]->id && !$jason->items[1]->id && !$jason->items[2]->id ) { $ngindek = 'noindex,nofollow'; $notfound = true; }

$title       = ''.$uhuk.' - Trapcity - 3gp mp3 mp4 download';
$ogtitle     = ''.$uhuk.' - Trapcity - 3gp mp3 mp4 download';
$description = 'Streaming & Download '.strtoupper($uhuk).' HD 1080p 720p 320Kbps mp3 and video mp4 3gp - Trapcity';
$keywords    = 'Download music mp3 '.$uhuk.', Download video '.$uhuk.', Streaming '.$uhuk.', Download song mp3 '.$uhuk.' free, Download video '.$uhuk.'  free, Download lagu';
$nail        = '/assets/img/thumbs.png';


include 'inc/header.php';

echo '<div xmlns:v="http://rdf.data-vocabulary.org/#">
<ol class="breadcrumb btn-box"><li><span typeof="v:Breadcrumb"><a href="http://' . $_SERVER['HTTP_HOST'] . '" rel="v:url" property="v:title">Home</a></span></li><li><span property="v:title">'.$uhuk.'</span></li></ol></div>';
?>
<div class="container">
    <div class="row">
        <section class="col-md-12">
            <div class="row">
            <section class="new-content">
                <div role="main" class="main col-md-9">
                      <?php 
                      if($notfound) {
                        echo '
                        <div class="ktz-titlepage">
                          <h1><span class="ktz-blocktitle">Video &amp; MP3 Not Found</span></h1>
                        </div>
                        <strong> Video or Mp3 Not Found :( </strong>';
                      } else { 
                      echo '
                      <div class="ktz-titlepage">
                          <h1><span class="ktz-blocktitle">Video &amp; Mp3 '.$uhuk.'</span></h1>
                      </div>
                      ';
                      if(!$order || $order == 'relevance') { ?>
                      <div class="order-by">Order:  <b>Relevance</b> | <a rel="nofollow" href="/<?php echo $key; ?>/<?php echo $q; ?>/order/date.html"> Date</a> | <a rel="nofollow" href="/<?php echo $key; ?>/<?php echo $q; ?>/order/viewCount.html"> View Count</a></div>
                      <?php } else if ($order == 'date') { ?>
                      <div class="order-by">Order:  <a rel="nofollow" href="/<?php echo $key; ?>/<?php echo $q; ?>/order/relevance.html"> Relevance</a> | <b>Date</b> | <a rel="nofollow" href="/<?php echo $key; ?>/<?php echo $q; ?>/order/viewCount.html"> View Count</a></div>
                      <?php } else { ?>
                      <div class="order-by">Order:  <a rel="nofollow" href="/<?php echo $key; ?>/<?php echo $q; ?>/order/relevance.html"> Relevance</a> | <a rel="nofollow" href="/<?php echo $key; ?>/<?php echo $q; ?>/order/date.html"> Date</a> | <b>ViewCount</b></div>
                      <?php }
                        foreach ($jason->items as $hasil)
                        {
                        $id          = $hasil->id->videoId;
                        $name        = $hasil->snippet->title;
                        $desc        = $hasil->snippet->description;
                        $chtitle  = $hasil->snippet->channelTitle;
                        $date     = dateyt($hasil->snippet->publishedAt);
                        $hasil       = ngegrab('https://www.googleapis.com/youtube/v3/videos?key='.$que.'&part=contentDetails,statistics&id='.$id.'');
                        $dt          = json_decode($hasil);
                        foreach ($dt->items as $dta)
                        {
                        $time        = $dta->contentDetails->duration;
                        $duration    = format_jam($time);
                        }
                        $ilangs = ilangin(mb_substr($name,0,80,'UTF-8'));
                        $ckbum= querysearch(ilangin($name));
                        $ptk = ptk($ilangs);
                        echo '
                        <article class="box-post ktz-archive">
                            <div class="entry-body media">
                                <a class="ktz_thumbnail pull-left" title="'.$ptk.'">
                                    <img src="http://i.ytimg.com/vi/'.$id.'/default.jpg" class="media-object ktz-lazyload" alt="'.$ptk.'" title="'.$ptk.'">
                                </a>
                                <div class="media-body ktz-post">
                                    <h2 class="entry-title ktz-titlemini"><a href="/mp3/video/'.$ckbum.'/v/'.$id.'.html" title="'.$ptk.'" rel="bookmark">'.$ilangs.'</a></h2>
                                    <span class="entry-author vcard"><i class="glyphicon glyphicon-user" style="color: #0f576f;"></i>  <a class="url fn" title="'.ptk($chtitle).'" rel="author">'.$chtitle.'</a></span><br>
                                    <span class="entry-date"><i class="glyphicon glyphicon-time" style="color: #8c6d04;"></i> '.$duration.'</span><span class="entry-date updated"><i class="glyphicon glyphicon-calendar" style="color: #994600;"></i>  <a rel="bookmark">'.$date.'</a></span>
                                    <div class="media-body ktz-post"><a target="_blank" href="http://adserver.adreactor.com/servlet/view/window/url/zone?zid=40&pid=4858" class="btn btn-custom green btn-xs" title="'.$ptk.'" rel="nofollow"><strong>Fast Download</strong></a> <a href="/mp3/video/'.$ckbum.'/v/'.$id.'.html#ply" class="btn btn-custom red btn-xs" title="Play & Download '.$ptk.'" rel="nofollow"><span class="glyphicon glyphicon-download"></span> <strong>Download</strong></a> 
                                    </div>
                                </div>
                                </div>
                        </article>';

                      }
                      }
                  ?>
                  <nav id="nav-index">
                      <ul class="pagination" align="center">
                        <?php if (strlen($prevpage)>1) { ?>
                          <li><a href="<?php echo '/'.$key.'/'.$q.'/'.$prevpage.'.html'; ?>" >« Prev Page</a>
                          </li>
                        <?php } if (strlen($nextpage)>1) { ?>
                          <li><a href="<?php echo '/'.$key.'/'.$q.'/'.$nextpage.'.html'; ?>" >Next Page &raquo;</a>
                          </li>
                        <?php } ?>
                      </ul>
                  </nav>
                </div>
                <div class="sbar col-md-3 widget-area wrapwidget" role="complementary">
                    <aside id="top-posts-3" class="widget widget_top-posts">
                        <?php include 'last.php'; ?>
                    </aside>

            </div>
            </section>
    </div>
      </section>
</div>
</div>


<?php include 'inc/footer.php'; ?>
