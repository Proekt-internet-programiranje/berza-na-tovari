<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<?php $this->view('header'); ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
    <li><a href="<?= site_url()?>/prevoznik/dodadi_vozac">Додади возач</a></li>
    <li><a href="<?= site_url()?>/prevoznik/objavi_vozilo">Објави возило</a></li>
    <li><a href="<?= site_url()?>/prevoznik/pregled_tovari">Преглед на товари</a></li>
    </ul>
  </div>
</nav>
<?php
$currentURL = current_url();
?>
<?php if ($currentURL=='http://[::1]/berza-na-tovari/index.php/prevoznik/dodadi_vozac') : ?>
        
<form action="<?= site_url('prevoznik/vozacreg') ?>" method="post" >

Име возач:
<input type="text" name="ime_vozac" />

Тип на возачка дозвола:
<input type="text" name="tip_na_vozacka"/>


Корисничко име:
<input type="text" name="korisnicko_ime"/>

Лозинка:
<input type="text" name="lozinka"/>

<input type="submit" value="Внеси возач">
</form>
<?php endif; ?>
<?php 
echo $output;
$this->view('footer'); ?>