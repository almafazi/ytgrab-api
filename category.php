<?php
include 'core/func.php';
$cat = $_GET['cat'];
$title       = ''.ucwords($cat).' | Free Download and Streaming Music Mp3 & Video MP4';
$ogtitle       = ''.ucwords($cat).' | Free Download and Streaming Music Mp3 & Video MP4';
$description = ''.ucwords($cat).' - Find '.ucwords($cat).' music genres on Trapcity';
$keywords    = 'Download music mp3 '.ucwords($cat).', Download video '.ucwords($cat).', Streaming '.ucwords($cat).', Download music mp3 '.ucwords($cat).' Free, Download video '.ucwords($cat).' free, Collection '.ucwords($cat).' Full Album';
$ngindek = 'index,follow';
$nail        = '/assets/img/thumbs.jpg';
include 'inc/header.php';
?>

<div class="container">
    <div class="row">
        <section class="col-md-12">
            <div class="row">
             <section class="new-content">
                <div role="main" class="main col-md-9">

                      <div class="ktz-titlepage">
                          <h1><span class="ktz-blocktitle"><?php echo strtoupper($cat); ?></span></h1>
                      </div>
                      <?php
                        $json=json_decode(ngegrab('http://api.soundcloud.com/tracks.json?genres='.$cat.'&client_id='.$clientid.'&limit=20'));
                        if (!empty($json[0]->title)){
                        foreach($json as $list){
                        $id=$list->id;
                        $permalink=$list->permalink;
                        $name=strip_tags($list->title);
                        $duration=format_times($list->duration/1000);
                        $size=$list->original_content_size;
                        $ngapload=$list->created_at;
                        $jam=str_replace('+0000','',$ngapload);
                        $jam =str_replace('/','-',$jam);
                        $view=$list->playback_count;
                        if($song=$list->artwork_url) {
                        $thumb = $song;
                        }
                        else {
                        $thumb = '/assets/img/ply.png';
                        }
                        $named = urldecode(querysearch($name));
                        $q_str = strlen(md5($named));
                        $q_str = substr(md5($named),$q_str-7,$q_str);
                        echo '
                        <article class="box-post ktz-archive">
                            <div class="entry-body media">
                                <a class="ktz_thumbnail pull-left" title="'.$name.'">
                                    <img src="'.$thumb.'" class="media-object ktz-lazyload" alt="'.$ilangs.'" title="'.$name.'" scale="0">
                                </a>
                                <div class="media-body ktz-post">
                                    <h2 class="entry-title ktz-titlemini"><a href="/'.$q_str.'/'.querysearch($name).'.html" title="'.$name.'" rel="bookmark">'.$name.'</a></h2>
                                    <span class="entry-author vcard">Size : '.size($size).'</span><br>
                                    <span class="entry-date updated">Duration :  <a href="#" rel="bookmark">'.$duration.'</a></span>
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
                        <h4 class="widget-title"><span class="ktz-blocktitle">Popular Song</span></h4>
                        <ul>
                          <?php
                          function cut($content,$start,$end){
                            if($content && $start && $end) {
                            $r = explode($start, $content);
                            if (isset($r[1])){
                            $r = explode($end, $r[1]);
                            return $r[0];
                            }return '';}}
                            $grab = strstr(ngegrab('https://www.apple.com/id/itunes/charts/songs/'),'class="section chart-grid');
                            $ipank = explode('</strong>',$grab);
                            for($i=1; $i<=8; $i++){
                            $file = cut($ipank[$i],'l=en">','</a>');
                            $artsi = cut($ipank[$i],'&amp;l=en">','</a></h4>');
                            $ipk = explode('">',$file);
                            $jdlnya = cut($ipk[0].'">','alt="','">');
                            $link=$artsi.'-'.$jdlnya;
                            $link=str_replace(' ', '-', $link);
                            $link=strtolower($link);
                            $named = urldecode(querysearch($link));
                            $q_str = strlen(md5($named));
                            $q_str = substr(md5($named),$q_str-7,$q_str);

                            if(!empty($ipk[0])){
                              echo '
                              <li><a href="/'.$q_str.'/'. querysearch($link) . '.html" title="' . $jdlnya . '"><span class="glyphicon glyphicon-headphones"></span> ' . $jdlnya . '</a>
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
</div></div>



<?php include 'inc/footer.php'; ?>
