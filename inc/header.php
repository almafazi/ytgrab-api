<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
ob_start("ob_gzhandler");
}
else {
ob_start();
} ?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="HandheldFriendly" content="True"/>
<meta name="MobileOptimized" content="320"/>
<?php echo '
<title>'.$title.'</title>
<meta name="description" content="'.substr($description,0,200).'" />
<meta name="google-site-verification" content="h49_lB4rvRyXUoEjAnkNbXS1PpDJO7jynQC-Sva670g" />
<meta name="yandex-verification" content="3943cc706fe22178" />
<meta name="Distribution" content="Global"/>
<meta name="Revisit-after" content="1 Day"/>
<meta name="author" content="Waptube"/>
<meta content="document" name="resource-type"/>
<meta content="all" name="audience"/>
<meta name="Rating" content="General"/>
<meta content="never" name="Expires"/>
<!-- social meta -->
<meta property="og:title" content="'.$ogtitle.'" />
<meta property="og:image" content="'.$nail.'">
<meta property="og:url" content="http://'.$_SERVER['HTTP_HOST'].''. $_SERVER['REQUEST_URI'].'" />
<meta name="og:description" content="'.substr($description,0,200).'"/>
<meta name="twitter:title" content="'.$ogtitle.'" />
<meta name="twitter:description" content="'.$description.'" />
<meta name="twitter:image" content="'.$nail.'" />
<meta name="twitter:site" content="http://'.$_SERVER['HTTP_HOST'].''. $_SERVER['REQUEST_URI'].'" />
<!-- crawler meta -->
<meta name="googlebot" content="'.$ngindek.'"/>
<meta name="spiders" content="'.$ngindek.'" />
<meta name="robots" content="'.$ngindek.'" />
<!-- komponen -->
'.$kanon.'
<link rel="shortcut icon" href="/assets/img/favicon.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link type="text/css" rel="stylesheet" href="assets/css/css.css"/>
<style type="text/css">
body{background:#eee;font-family:"Open Sans",sans-serif;font-size:14px;font-style:normal;color:#222;}.ktz-mainheader{background:#fff;}.ktz-allwrap{margin:5px auto 10px auto;width:100%;max-width:760px;}@media only screen and (max-width: 992px) {.ktz-allwrap{width:99%;}}.ktz-logo h1.homeblogtit a,.ktz-logo h1.homeblogtit a:visited,.ktz-logo h1.homeblogtit a:hover,.ktz-logo .singleblogtit a,.ktz-logo .singleblogtit a:hover,.ktz-logo .singleblogtit a:active,.ktz-logo .singleblogtit a:focus,.ktz-logo .singleblogtit a:visited{color:#222222}.ktz-logo .desc{color:#999999}h1,h2,h3,h4,h5,h6,.ktz-logo div.singleblogtit{font-family:"Open Sans",helvetica;font-style:normal;color:#2b2b2b;}a:hover,a:focus,a:active,#breadcrumbs-wrap a:hover,#breadcrumbs-wrap a:focus,a#cancel-comment-reply-link:hover{color:#0087ff;}.entry-content input[type=submit],.page-link a,input#comment-submit,.wpcf7 input.wpcf7-submit[type="submit"],.bbp_widget_login .bbp-login-form button,#wp-calendar tbody td:hover,#wp-calendar tbody td:hover a,.ktz-bbpsearch button,a.readmore-buysingle,input#comment-submit,.widget_feedburner,.ktz-readmore,.ktz-prevnext a{background:#0087ff;}.page-link a:hover{background:#4c4c4c;color:#ffffff;}.ktz-allwrap.wrap-squeeze,.tab-comment-wrap .nav-tabs>li.active>a,.tab-comment-wrap .nav-tabs>li.active>a:focus,.tab-comment-wrap .nav-tabs>li.active>a:hover,.tab-comment-wrap .nav-tabs>li>a:hover{border-color:#0087ff;}.ktz_thumbnail a.link_thumbnail,.owl-theme .owl-controls .owl-buttons .owl-prev span,.owl-theme .owl-controls .owl-buttons .owl-next span,.pagination>.active>a,.pagination>.active>span,.pagination>.active>a:hover,.pagination>.active>span:hover,.pagination>.active>a:focus,.pagination>.active>span:focus{background-color:#0087ff;}.pagination>.active>a,.pagination>.active>span,.pagination>.active>a:hover,.pagination>.active>span:hover,.pagination>.active>a:focus,.pagination>.active>span:focus{border-color:#0087ff #0087ff #0087ff transparent;}.ktz_thumbnail.ktz_thumbnail_gallery a.link_thumbnail{background-color:transparent;}
</style>
<script>
jQuery("document").ready(function(n){var a=n(".navZ");n(window).scroll(function(){n(this).scrollTop()>136?a.addClass("f-nav"):a.removeClass("f-nav")})});
</script>
</head>
<body class="home blog kentooz" id="top">
<div class="ktz-allwrap">
<header class="ktz-mainheader">
<div class="header-wrap">
<div class="container">
<div class="clearfix">
<div class="ktz-logo">

<a href="/" title="Waptube"><img src="/assets/img/trapcity.png" alt="Trapcity"/></a>

<h1 class="homeblogtit-hide">Free Download and Streaming Music Mp3 & Video MP4, WeBM</h1>

<div class="desc-hide">Trapcity is a video and music mp3 site that can be downloaded and watched also streaming for free. download easily is also fast with an various formats like mp3 webm and mp4 in HD quality 1080p, 720p, 320KBps!</div>

</div>
</div>
</div>
</div>
</header>'; ?>

  <div class="container-fluid">
  <nav class="navbar navbar-default">

    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
      <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home"></span> Home</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Genre<span class="caret"></span></a>
          <ul class="dropdown-menu">
 <li><a href="/category/reggae/">Reggae</a></li><li><a href="/category/dangdut/">Dangdut Koplo</a></li><li><a href="/category/pop/">Pop</a></li><li><a href="/category/k-pop/">K-Pop</a></li><li><a href="/category/j-pop/">J-Pop</a></li><li><a href="/category/hip-hop/">Hip Hop</a></li><li><a href="/category/alternative/">Alternative</a></li><li><a href="/category/rock/">Rock</a></li><li><a href="/category/country/">Country</a></li><li><a href="/category/dance/">Dance</a></li><li><a href="/category/soul/">R&B/Soul</a></li><li><a href="/category/jazz/">Jazz</a></li><li><a href="/category/folk/">Folk</a></li><li><a href="/category/world/">World</a></li><li><a href="/category/punk/">Punk</a></li><li><a href="/category/soundtrack/">Soundtrack</a></li>          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Viral Video<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/top-videos/gb.html" class="genres" title="United Kingdom">United Kingdom</a></li>
            <li><a href="/top-videos/us.html" class="genres" title="United States">United States</a></li>
            <li><a href="/top-videos/kr.html" class="genres" title="South Korea">South Korea</a></li>
            <li><a href="/top-videos/it.html" class="genres" title="Italy">Italy</a></li>
            <li><a href="/top-videos/fr.html" class="genres" title="France">France</a></li>
            <li><a href="/top-videos/de.html" class="genres" title="Germany">Germany</a></li>
            <li><a href="/top-videos/sg.html" class="genres" title="Singapore">Singapore</a></li>
            <li><a href="/top-videos/za.html" class="genres" title="South Africa">South Africa</a></li>
            <li><a href="/top-videos/au.html" class="genres" title="Australia">Australia</a></li>
            <li><a href="/top-videos/ae.html" class="genres" title="UAE">UAE</a></li>
            <li><a href="/top-videos/sa.html" class="genres" title="Saudi Arabia">Saudi Arabia</a></li>
            <li><a href="/top-videos/nl.html" class="genres" title="Netherland">Netherland</a></li>
            <li><a href="/top-videos/es.html" class="genres" title="Spain">Spain</a></li>
            <li><a href="/top-videos/pr.html" class="genres" title="Portugal">Portugal</a></li>
          </ul>
        </li>
      </ul>



</div></nav>
<div class="finds">Type to find your song or video then <em>click Enter!</em></div>
<form action="/search.php" method="get" id="hyv-yt-search">
<div class="ktz-search has-feedback">
<label class="control-label sr-only" >Search</label>
<input type="text" name="q" class="form-control btn-box ui-autocomplete-input" id="hyv-search" <?php if(!$_GET['q']) { echo 'placeholder="Search video or song .. "'; } else { echo 'value="'.queryname($_GET['q']).'"';} ?>/>
<span class="glyphicon glyphicon-search form-control-feedback"></span>
</div>
</form>
</div>
