<?php
include 'core/func.php';


if (!$_GET['q'] && !$_GET['id']) {
    header('Location: index.php');
}
    $q = $_GET['q'];

$endchar = substr($q, -1);

    if($endchar == '-'){
    $id = '-'.$_GET['id'];
    } else {
    $id = $_GET['id'];
    }
$kanon = '<link rel="canonical" href="http://'.$_SERVER['HTTP_HOST'].'/mp3/video/'.$q.'/v/'.$id.'.html" />';
$uhuk = queryname($q);

        $id2 = '/'.$id;
        $idr = $id;
        $yf = ngegrab('https://www.googleapis.com/youtube/v3/videos?key=' . $devkey . '&part=snippet,contentDetails,statistics,topicDetails&id=' . $id . '');
        $yf = json_decode($yf);


        if ($yf) {
            foreach ($yf->items as $item) {
                $name          = $item->snippet->title;
                $tag           = $item->snippet->tags;
                $descr         = $item->snippet->description;
                $chtitle       = $item->snippet->channelTitle;
                $channelId     = $item->snippet->channelId;
                $date          = dateyt($item->snippet->publishedAt);
                $ctd           = $item->contentDetails;
                $duration      = format_time($ctd->duration);
                $st            = $item->statistics;
                $views         = $st->viewCount;
                $ngethumb      = 'http://img.youtube.com/vi/' . $id . '/mqdefault.jpg';
                $gede          = 'https://i.ytimg.com/vi/' . $id . '/hqdefault.jpg';
                $artists = ilangin($name);
                $posisi = strpos($artists, "-");
                $artistsfix = substr($artists, 0, $posisi);
            }
        }
                  if(!$descr || strlen($descr) < 60) {
                  $descnew = 'Streaming & Download '.substr($artists,0,60).' Song or Video Mp4 Mp3 3gp Free On Trapcity.';
                  $descs = 'Streaming & Download '.substr($artists,0,60).' Song or Video HD 1080p, 720p, 320Kbps Webm Mp4 Mp3 3gp Free On Trapcity.';
                  } else {
                  $descnew = ''.substr($artists,0,60).', '.descript($descr).'';
                  $descs = ''.substr($artists,0,60).', '.$descr.'';
                  }



                $title       = ''.ucwords($artists).' | MP3 Song & Video Download - Trapcity';
                $ogtitle       = ''.$artists.' | MP3 Song & Video Download - Trapcity';
                $description = ''.queryname($descnew).'';
                $keywords    = 'Download music mp3 '.$uhuk.', Download video '.$uhuk.', Streaming '.$uhuk.', Download song mp3 '.$uhuk.' free, Download video '.$uhuk.'  free, Download lagu, mp3 gratis';
                $nail        = ''.$gede.'';
                $ngindek = 'index,follow';
                
                if(!$name) { $ngindek = 'noindex,nofollow'; $notfound = true; $title = $ogtitle = $description = 'Not Found | Download MP3 Song & Video - Trapcity';}

                include 'inc/header.php';

                echo '
                <div xmlns:v="http://rdf.data-vocabulary.org/#"><ol class="breadcrumb btn-box"><li><span typeof="v:Breadcrumb"><a href="http://' . $_SERVER['HTTP_HOST'] . '" rel="v:url" property="v:title">Home</a></span></li> ';
                if (strpos($name, '-') !== false) {
                echo '
                <li><span typeof="v:Breadcrumb"><a href="/mp3/video/'.querysearch($artistsfix).'.html" rel="v:url" property="v:title">'.ucwords(substr($artists, 0, $posisi)).'</a></span></li><li><span property="v:title">'.ucwords(substr($artists, $posisi+1, 100)).'</span></li> ';
                } else {
                echo '
                <li><span typeof="v:Breadcrumb"><a href="/top-videos" rel="v:url" property="v:title">Download</a></span></li><li><span property="v:title">'.ucwords($artists).'</span></li>  ';
                }
                echo '
                </ol></div>
                ';

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
                       <article class="ktz-single">
                          <div class="ktz-single-box">
                              <div class="entry-body">
                               <h1 class="entry-title clearfix">Not Found</h1></div></div>
                               <div class="entry-content ktz-wrap-content-single clearfix ktz-post">
                               <strong>Video or MP3 Not Found!</strong>
                               </div>
                        </article>';
                      } else {
                      echo '
                      <article class="ktz-single">
                          <div class="ktz-single-box">
                              <div class="entry-body">
                               <h1 class="entry-title clearfix">'.$artists.'</h1>
                                  <div class="metasingle-aftertitle">
                                      <div class="ktz-inner-metasingle"><span class="entry-author vcard">By <a class="url fn" href="https://www.youtube.com/channel/'.$channelId.'" title="Visit '.$chtitle.'">'.$chtitle.' </a></span> <span class="entry-author vcard"><br> Duration : <a class="url fn" href="" title="" rel="author"></a>' . $duration . '</span> <span class="entry-date updated">Date : <time datetime="'.$date.'"> '.$date.' </time> </span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="entry-content ktz-wrap-content-single clearfix ktz-post">
                              <div style="width: 110px" class="wp-caption alignleft"><img class="wp-image" src="http://i.ytimg.com/vi/'.$id.'/default.jpg" alt="'.$artists.'" title="'.$artists.'" width="300" height="300" />
                              </div>
                              <p><strong>'.$artists.'</strong>
                                  <br>Video / Audio that appear on this page were generated automatically from internet. The Webmaster does not hold any Legal Rights of Ownership on them. We do not Save / Host this Video / Audio in our hosting. If by anyhow any of them is offensive to you, please Contact Us asking for the removal. If there is a broken link to search Music / Video we are not in charge of it. Music / Video download is delivered from Soundcloud / Youtube and maybe containing a music Copyright. This website just only a search engine media. We just linked the file or embed & display them here to make visitor easy to find it. </p>
                          </div>
                          <div id="ply"></div>
                          <br/>
                          <center>
                              <div class="entry-content ktz-wrap-content-single clearfix ktz-post">
                                  <iframe src="http://www.youtube.com/embed/'.$id.'" width="100%" height="350" frameborder="0"></iframe>
                              </div>
                          </center>
                          <table class="table table-bordered">
                              <tbody align="left">
                                  <tr valign="top">
                                      <td width="30%">Title</td>
                                      <td>:</td>
                                      <td><strong>'.$artists.'</strong>
                                      </td>
                                  </tr>
                                  <tr valign="top">
                                      <td width="30%">Uploaded By</td>
                                      <td>:</td>
                                      <td> <a title="'.$chtitle.'">'.$chtitle.'</a> </td>
                                  </tr>
                                  <tr valign="top">
                                      <td width="30%">Durasi</td>
                                      <td>:</td>
                                      <td>'.$duration.'</td>
                                  </tr>
                                  <tr valign="top">
                                      <td width="30%">Album</td>
                                      <td>:</td>
                                      <td>'.$chtitle.' Official Album / Single</td>
                                  </tr>

                                  <tr valign="top">
                                      <td width="30%">Source</td>
                                      <td>:</td>
                                      <td>YT</td>
                                  </tr>
                                  <tr valign="top">
                                      <td width="30%">Type of file</td>
                                      <td>:</td>
                                      <td>Audio MP3 (.mp3)</td>
                                  </tr>
                                  <tr valign="top">
                                      <td width="30%">Audio Summary</td>
                                      <td>:</td>
                                      <td>Mp3, 44100 Hz, stereo, s16p, 320Kbps</td>
                                  </tr>
                              </tbody>
                          </table>
                          <center><strong>Download MP3 : </strong><br>
                          <em>(Refresh this page if the song player doesn\'t appear)</em></center>
                          <div class="embed-audio-mp3">
                              <audio class="wp-audio-shortcode" id="audio-29431-2" preload="none" style="width: 100%;" controls="controls">
                                  <source type="audio/mpeg" src="http://download.bagishared.website/redirect.php?search=' . querysearch($artists) . '" />
                              </audio><br><br>
                              <center><a target="_blank" class="btn btn-custom blue btn-sm" rel="nofollow" href="http://adserver.adreactor.com/servlet/view/window/url/zone?zid=40&pid=4858"><span style="color: white"> Download Now </span> </a>
                              </center>

                          </div>
                          <center>
                          <p class="download"><button class="btn btn-custom green btn-sm" type="button" data-toggle="modal" data-target="#myModal">
                              <span class="glyphicon glyphicon-download"></span> Download Mp3</button> | <button class="btn btn-custom green btn-sm" type="button" data-toggle="modal" data-target="#myModal1">
                              <span class="glyphicon glyphicon-download"></span> Download Video</button>
                              </p>
                          </center><br>
                          <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Download Audio</h5>
                                </div>
                                <div class="modal-body">
                                <center>
                                <strong>Server 1</strong><br>
                                <a target="_blank" href="//www.youtubeinmp3.com/fetch/?video=https://www.youtube.com/watch?v='.$id.'" style="text-decoration:underline;color:#03a730;"><strong>DOWNLOAD MP3</strong></a><br>
                                <strong>Server 2</strong><br>
                                <iframe src="https://ycapi.org/button/?v='.$id.'&t=1" width="200" scrolling="no" style="height:38px!important; border:none;"></iframe><br>
                                <strong>Other Quality</strong><br>
                                <iframe src="//api.listenvid.com/?default/'.$id.'/mp3/fff" width="100%" height="100px" scrolling="no" style="border:none;"><iframe src="" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:20px;" allowTransparency="true"></iframe>
                                </center>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                        </div>
                 <!-- Modal HTML -->
                <div id="myModal1" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Download Video</h4>
                                            </div>
                                            <div class="modal-body">
                                            <center>
                                            <strong>Server 1</strong><br>
                                            ';
			
                       $grab = ngegrab('https://www.saveitoffline.com/process/?url=https://www.youtube.com/watch?v='.$id.'&type=json');
                        $json = json_decode($grab);
                        if ($json) {
                            foreach ($json->urls as $hasil) {
                                $link     = $hasil->id;
                                $label = $hasil->label;
                                echo '<a target="_blank" class="btn btn-custom blue btn-sm" title="Download Video '.$artists.' Free" rel="nofollow" href="'.$link.'"><span class="glyphicon glyphicon-download"></span>'.$label.'</a><br>';
                            }
                        }
                        
                        echo '
                        </center>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <article>
                          <strong>Description: </strong>
                          <p>
                          '.nl2br(substr($descs,0,30000)).'..
                          </p>
                          </article>
                          <br>
                          <blockquote>
                          <p>If you download the song or video <b>'.$artists.'</b> try only for review only, if indeed you like the song or video <b> '.$artists.'</b>, Buy original official tapes or their official CDs, you can also download legally On Official iTunes <b> '.$artists.'</b>  on all charts and Radio charts.</p>

                          </blockquote>

                          <p class="ktz-tagcontent">Tags:
                           ';
                          $tags = explode(",",$tag);
                          foreach ($tag as $key) {
                            $url = querysearch($key);
                            $q_str = strlen(md5(urldecode($url)));
                            $q_str = substr(md5(urldecode($url)),$q_str-7,$q_str);
                            echo '<a rel="nofollow" href="/'.$q_str.'/'.$url.'.html" title="Tag '.$key.'">#'.$key.' </a>';
                          }
                          echo '
                          </p>

                          <ul class="nav nav-pills ktz-pills">
                            <li class="ktz-twitter"><a href="/" title="Kembali ke-beranda" rel="prev"><font color="white">«</font></a>
                            </li>
                            <li><a href="http://www.facebook.com/sharer/sharer.php?u=http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'] . '" target="_blank" class="ktz-facebook" title="Share This On facebook"><span class="fontawesome ktzfo-facebook"><font color="white">Facebook</font></a>
                            </li>
                            <li><a href="http://twitter.com/home?status=http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'] . '" target="_blank" class="ktz-twitter" title="Share This On twitter"><span class="fontawesome ktzfo-twitter"><font color="white"> Twitter</font></a>
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle fye-dropdown js-activated" data-toggle="dropdown">...</a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="https://plus.google.com/share?url=http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'] . '" class="fye-gplus" target="_blank" title="Share This On google plus">Google Plus</a>
                                    </li>
                                    <li><a href="http://www.digg.com/submit?url=http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'] . '" class="fye-digg" target="_blank" title="Share This On Digg">Digg</a>
                                    </li>
                                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'] . '" class="fye-linkedin" target="_blank" title="Share This On Linkedin">Linkedin</a>
                                    </li>
                                </ul>
                                </li>
                            </ul>
                                <br>
                      </article>'; }?>
                </div>
                <div class="sbar col-md-3 widget-area wrapwidget" role="complementary">
                    <aside id="top-posts-3" class="widget widget_top-posts">
                        <?php if(!$notfound) { ?>
                        <h4 class="widget-title"><span class="ktz-blocktitle">Related</span></h4>
                        <ul>
                          <?php 

                              if($grabz = ngegrab('https://www.googleapis.com/youtube/v3/search?part=snippet&order=relevance&key='.$devkey.'&part=snippet&maxResults=6&relatedToVideoId='.$id.'&type=video'))
                              {
                              $jason = json_decode($grabz);
                              foreach ($jason->items as $hasilf)
                              {
                              $idf          = $hasilf->id->videoId;
                              $namef        = mb_substr($hasilf->snippet->title,0,50,'UTF-8');
                              $namef1       = $hasilf->snippet->title;
                              $datef     = dateyt($hasilf->snippet->publishedAt);
                              $hasilff       = ngegrab('https://www.googleapis.com/youtube/v3/videos?key='.$devkey.'&part=contentDetails,statistics&id='.$idf.'');
                              $dtf          = json_decode($hasilff);
                              foreach ($dtf->items as $dtaf)
                              {
                              $timef        = $dtaf->contentDetails->duration;
                              }
                              $kbm = querysearch(ilangin($namef1));
                              $q_str = strlen(md5(urldecode($kbm)));
                              $q_str = substr(md5(urldecode($kbm)),$q_str-7,$q_str);

                            echo '<li><center><div style="width: 122px;" class="wp-caption"><img class="wp-image" src="http://i.ytimg.com/vi/'.$idf.'/default.jpg" alt="'.$namef.'" title="'.$namef.'" width="300" height="300" /></div><a href="/'.$q_str.'/'.$kbm.'.html" title="'.ilangin($namef).'"> '.ilangin($namef).'</a></center>
                            </li>';
                            }
                          }
                            ?>

                        </ul>
                        <br>
                        <?php } include 'last.php'; ?>
                    </aside>
                </div>
                </section>
            </div>
            </section>
    </div>

</div>



<?php include 'inc/footer.php'; ?>
