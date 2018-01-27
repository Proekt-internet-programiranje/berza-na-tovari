<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Берза на товари</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>/pomosno/futer/futer.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<body style="height:100%">
   <header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= site_url()?>">Берза на товари</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Дома</a></li>
            <li class="float-right"><a href="<?= site_url()?>/pocetna/odjavi_se">Одјави се</a></li>
            </ul>
        </div>
    </nav>
   </header>