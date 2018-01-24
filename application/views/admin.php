<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="<?= site_url()?>/admin/korisnici">Корисници</a></li>
      <li><a href="<?= site_url()?>/prevoznik/dodadi_vozac">Додади возач</a></li>
      <li><a href="<?= site_url()?>/prevoznik/objavi_vozilo">Објави возило</a></li>
      <li><a href="<?= site_url()?>/prevoznik/pregled_tovari">Преглед на товари</a></li>
      <li><a href="<?= site_url()?>/spedicija/vnesi_tovar">Внесување на товар</a></li>
      <li><a href="<?= site_url()?>/spedicija/pregled_vozila">Преглед на слободни возила</a></li>
      <li><a href="<?= site_url()?>/spedicija/vnesi_tura">Внесување на тура</a></li>
    </ul>
  </div>
</nav>