<?php
include 'core/func.php';

$title='Trapcity: Free Download and Streaming Music Mp3 & Video MP4' ;
$ogtitle='Trapcity: Free Download and Streaming Music Mp3 & Video MP4' ;
$description='Trapcity is a easy and free song or video streaming and download  site.' ;
$keywords='Music, Video, Download Music, Download Video, Watch Movie, Stafaband, Popular Song, Muviza, Savelagu, Planetlagu, Tvile, Rock, Pop, Tutorial Video' ;
$nail='/assets/img/thumbs.png' ;
$ngindek='index,follow' ;

include 'inc/header.php';
?>
<div class="container">
    <div class="row">
        <section class="col-md-12">
            <div class="row">
              <section class="new-content">
                <div role="main" class="main col-md-9">

                      <?php
                      include 'ipdetect.php';

                      function getUserIP(){
                            $ip = "unknown";
                            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                                $ip = $_SERVER['HTTP_CLIENT_IP'];
                            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                            } else {
                                $ip = $_SERVER['REMOTE_ADDR'];
                            }
                            $ip=explode(',',$ip);
                            
                            return preg_replace('/\s+/', '', $ip[0]);
                        }

                        $cc = ip_info('8.8.8.8', "Country Code");
                        $cd = ip_info('8.8.8.8', "Country");
                        $nation = strtolower($cc);
                        $nt = $nation;
                        if(file_exists('cache/trending_'.$cc.'.json')){
                        $time=filemtime('cache/trending_'.$cc.'.json')+60*60;
                        if($time<time()){
                        $grab = ngegrab('https://www.googleapis.com/youtube/v3/videos?key='.$devkey.'&part=snippet,contentDetails,statistics&chart=mostPopular&maxResults=10&regionCode='.$nt.'');
                        file_put_contents('cache/trending_'.$cc.'.json',$grab);
                        }else{
                        $grab=file_get_contents('cache/trending_'.$cc.'.json');
                        }
                        }else{
                        $grab = ngegrab('https://www.googleapis.com/youtube/v3/videos?key='.$devkey.'&part=snippet,contentDetails,statistics&chart=mostPopular&maxResults=10&regionCode='.$nt.'');
                        file_put_contents('cache/trending_'.$cc.'.json',$grab);
                        }
                        $json=json_decode($grab);
                    
                      if ($json) {
                      foreach ($json->items as $hasil) {
                          $link     = $hasil->id->videoId;
                          $id       = $hasil->id;
                          $name     = $hasil->snippet->title;
                          $desc     = $hasil->snippet->description;
                          $chtitle  = $hasil->snippet->channelTitle;
                          $chid     = $hasil->snippet->channelId;
                          $duration = format_time($hasil->contentDetails->duration);
                          $date     = dateyt($hasil->snippet->publishedAt);
                          $ttl      = substr($name,0,60);
                          $ptkttl = ptk($ttl);
                          
                          $links = urldecode(querysearch($name));
                          $q_str = strlen(md5(urldecode($links)));
                          $q_str = substr(md5(urldecode($links)),$q_str-7,$q_str);
                        echo '
                        <article class="box-post ktz-archive">
                            <div class="entry-body media">
                                <a class="ktz_thumbnail pull-left" title="'.$ptkttl.'">
                                    <img width="77" height="55" src="http://i.ytimg.com/vi/'.$id.'/default.jpg" data-src="http://i.ytimg.com/vi/'.$id.'/default.jpg" class="media-object ktz-lazyload" alt="'.$ptkttl.'">
                                </a>
                                <div class="media-body ktz-post">
                                    <h2 class="entry-title ktz-titlemini"><a href="/'.$q_str.'/' .querysearch($name) . '.html" title="'.$ptkttl.'">'.$ttl.'</a></h2>
                                    <span class="entry-author vcard"><i class="glyphicon glyphicon-user" style="color: #0f576f;"></i> <a class="url fn" title="Post by '.ptk($chtitle).'" rel="author">'.$chtitle.'</a></span><br>
                                    <span class="entry-date"><i class="glyphicon glyphicon-time" style="color: #8c6d04;"></i> '.$duration.'</span><br><span class="entry-date updated"><i class="glyphicon glyphicon-calendar" style="color: #994600;"></i> <a rel="bookmark"><time datetime="'.$date.'">'.$date.'</time></a></span>
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
                        <h4 class="widget-title"><span class="ktz-blocktitle">Popular Song in <?php echo $cd; ?></span></h4>
                        <ul><?php
                        $cc = strtolower($cc);                    
                        if(file_exists('cache/itunes_'.$cc.'.json')){
                        $time=filemtime('cache/itunes_'.$cc.'.json')+(7*24*60*60);
                        if($time<time()){
                        $andriasgrab=ngegrab('https://itunes.apple.com/'.$cc.'/rss/topsongs/limit=25/json');
                        file_put_contents('cache/itunes_'.$cc.'.json',$andriasgrab);
                        }else{
                        $andriasgrab=file_get_contents('cache/itunes_'.$cc.'.json');
                        }
                        }else{
                        $andriasgrab=ngegrab('https://itunes.apple.com/'.$cc.'/rss/topsongs/limit=25/json');
                        file_put_contents('cache/itunes_'.$cc.'.json',$andriasgrab);
                        }
                        $andriastop=json_decode($andriasgrab);
                        $andrias = $andriastop->feed->entry;
                        foreach( $andrias as $andriasz ) {
                        $name = $andriasz->{'im:name'}->label; 
                        $artist = $andriasz->{'im:artist'}->label;
                        $image = $andriasz->{'im:image'}[0]->label;
                        $link = $artist. ' - ' .$name;
                        $url = querysearch($link);
                        $q_str = strlen(md5(urldecode($url)));
                        $q_str = substr(md5(urldecode($url)),$q_str-7,$q_str);
                           if(!empty($image)){
                            echo '
                            <li><a title="'.$link.'" href="/'.$q_str.'/'. $url . '.html"><span class="glyphicon glyphicon-headphones"></span> ' . $link . '</a>
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
