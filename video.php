<?php
include 'core/func.php';

if($_GET['nation']) {
  $nt = $_GET['nation'];
} else {
  $nt = 'id';
}

$title       = 'Viral Videos on '.strtoupper($nt).' | Trapcity';
$ogtitle       = 'Viral Videos on '.strtoupper($nt).' | Trapcity';
$description = 'Top Videos - Viral Video On '.strtoupper($nt).' - Trapcity';
$keywords    = 'Search stream and download world videos, Search stream and download world music';
$nail        = '/assets/img/thumbs.jpg';
$ngindek = 'index,follow';
$kanon = '<link rel="canonical" href="http://'.$_SERVER['HTTP_HOST'].'/top-videos/us.html" />';
include 'inc/header.php';


 ?>
 <div class="container">
     <div class="row">
         <section class="col-md-12">
             <div class="row">
                   <section class="new-content">
                 <div role="main" class="main col-md-9">
                       <div class="ktz-titlepage">
                           <h1><span class="ktz-blocktitle">Viral Videos in <?php echo strtoupper($nt); ?></span></h1>
                       </div>
                       <?php
                       $grab = ngegrab('https://www.googleapis.com/youtube/v3/videos?key='.$devkey.'&part=snippet,contentDetails,statistics&chart=mostPopular&maxResults=25&regionCode='.$nt.'');
                        $json = json_decode($grab);
                        if ($json) {
                           foreach ($json->items as $hasil) {
                               $link     = $hasil->id->videoId;
                               $id       = $hasil->id;
                               $name     = $hasil->snippet->title;
                               $desc     = $hasil->snippet->description;
                               $chtitle  = $hasil->snippet->channelTitle;
                               $chid     = $hasil->snippet->channelId;
                               $date     = dateyt($hasil->snippet->publishedAt);
                               $time     = $dta->contentDetails->duration;
                               $duration = format_time($time);
                               $views    = $dta->statistics->viewCount;
                         $ilangs = ilangin(substr($name,0,80));
                         $ckbum= querysearch(ilangin($name));
                         echo '
                         <article class="box-post ktz-archive">
                             <div class="entry-body media">
                                 <a class="ktz_thumbnail pull-left" title="'.$ilangs.'">
                                     <img src="http://i.ytimg.com/vi/'.$id.'/default.jpg" class="media-object ktz-lazyload" alt="'.$ilangs.'" title="'.$ilangs.'" scale="0">
                                 </a>
                                 <div class="media-body ktz-post">
                                     <h2 class="entry-title ktz-titlemini"><a href="/music/video/'.$ckbum.'/v/'.$id.'.html" title="'.$ilangs.'" rel="bookmark">'.$ilangs.'</a></h2>
                                     <span class="entry-author vcard">By <a class="url fn" title="'.$chtitle.'" rel="author">'.$chtitle.'</a></span><br>
                                     <span class="entry-date updated">On <a rel="bookmark">'.$date.'</a></span>
                                     </div>
                                 </div>
                         </article>';

                       }
                   } else {
                       echo 'Result Not Found, please contact almafazi@post.com </font><br> &raquo; <a href="http://admaster.union.ucweb.com/appwall/applist.html?pub=shipw@govuze" title="download cepat"> Download fast with uc browser </a>';
                   }
                   ?>
                 </div>
                 <div class="sbar col-md-3 widget-area wrapwidget" role="complementary">
                     <aside id="top-posts-3" class="widget widget_top-posts">
                         <h4 class="widget-title"><span class="ktz-blocktitle">Popular Song in <?php echo strtoupper($nt); ?></span></h4>
                         <ul>
                           <?php
                           $cc = strtolower($nt);
                        $cc = 'https://itunes.apple.com/'.$cc.'/rss/topsongs/limit=25/json';
                        $andriasgrab=ngegrab($cc);
                        $andriastop=json_decode($andriasgrab);
                        $andrias = $andriastop->feed->entry;
                        foreach( $andrias as $andriasz ) {
                        $name = $andriasz->{'im:name'}->label; 
                        $artist = $andriasz->{'im:artist'}->label;
                        $image = $andriasz->{'im:image'}[1]->label;
                        $link = $artist. ' - ' .$name;
                        $url = querysearch($link);
                       $q_str = strlen(md5(urldecode($url)));
                       $q_str = substr(md5(urldecode($url)),$q_str-7,$q_str);
                           if(!empty($image)){
                            echo '
                            <li><a title="'.$link.'" href="/'.$q_str.'/'. querysearch($link) . '.html""><span class="glyphicon glyphicon-headphones"></span> ' . $link . '</a>
                            </li>
                            ';
                          }
                        }
                               ?>
                         </ul>
                         <br>
                         <?php include 'last.php'; ?>
                     </aside>

             </div>
             </section>
             </div>
              </section>
     </div>
 </div>



 <?php include 'inc/footer.php'; ?>
