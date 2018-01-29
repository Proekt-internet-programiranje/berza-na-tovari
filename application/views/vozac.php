<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<?php $this->view('header'); ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
    <li><a href="<?= site_url()?>/vozac/pregled_na_tura">Преглед на тура</a></li>
    <li><a href="<?= site_url()?>/vozac/pregled_na_turi">Преглед на тури</a></li>
    <li><a href="<?= site_url()?>/vozac/sostojba_na_vozilo">Ажурирање на состојба на возило</a></li>
    </ul>
  </div>
</nav>
<?php if(isset($output)) 
echo $output;
$this->view('footer'); ?>