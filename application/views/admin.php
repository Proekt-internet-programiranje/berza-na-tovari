<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<?php $this->view('header'); ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="<?= site_url()?>/admin/korisnici">Корисници</a></li>
      <li><a href="<?= site_url()?>/admin/kompanija">Компании</a></li>
      <li><a href="<?= site_url()?>/admin/vozac">Возачи</a></li>
      <li><a href="<?= site_url()?>/admin/vozilo">Возила</a></li>
      <li><a href="<?= site_url()?>/admin/tovar">Товари</a></li>
      <li><a href="<?= site_url()?>/admin/tura">Тури</a></li>
    </ul>
  </div>
</nav>
<?php 
echo $output;
$this->view('footer'); ?>