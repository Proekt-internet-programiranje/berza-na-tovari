<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Берза на товари</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
<title>Берза на товари</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- Bootstrap 3.3.2 -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
<!-- FontAwesome 4.3.0 -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons 2.0.0 -->
<link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
<!-- Theme style -->
<link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<!-- AdminLTE Skins. Choose a skin from the css/skins 
     folder instead of downloading all of them to reduce the load. -->
<link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
<style>
body { margin: 0; }

section { 
  height: 2000px;
  padding-top: 100px; }


.fixed {
  position: absolute;
  top:0; left:0;
  width: 100%; }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <?php if(isset($css_files)){
                foreach($css_files as $file)
	            echo "<link type='text/css' rel='stylesheet' href='$file' />\n";
            }
    
            if(isset($js_files)){
            foreach($js_files as $file)
	           echo "<script src='$file'></script>\n";
            }
        ?>
</head>
<body>
<div class="w3-on-top sticky ">
<div class="w3-bar  w3-deep-orange  w3-padding w3-card">
  <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large" style="background-color:deep-orange; color:white" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
  <a href="<?= site_url()?>" class="w3-btn w3-bar-item w3-button w3-hover-deep-orange" style="text-shadow:1px 1px 0 #444"><b>Берза на товари</b></a>
    <div class="w3-right w3-hide-small">
      <a href="<?= site_url()?>/pocetna/odjavi_se" class="w3-btn w3-bar-item w3-button w3-hover-deep-orange" style="text-shadow:1px 1px 0 #444">Одјави се</a>
    </div>
  </div>
</div>
<script>
  $(window).scroll(function(){
    var sticky = $('.sticky'),
        scroll = $(window).scrollTop();
  
    if (scroll >= 100) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
  });
</script>
        </body>
        </html>