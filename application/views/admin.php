<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<?php $this->view('header'); ?>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
.w3-sidebar {
  z-index: 3;

}
</style>
<body>

<nav class="w3-sidebar w3-card w3-bar-block w3-collapse w3-medium w3-animate-left" style="background-color:#262626; color:white" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
 
  <a class="w3-bar-item w3-button" href="<?= site_url()?>/admin/korisnici">Корисници</a>
  <a class="w3-bar-item w3-button" href="<?= site_url()?>/admin/kompanija">Компании</a>
  <a class="w3-bar-item w3-button" href="<?= site_url()?>/admin/vozac">Возачи</a>
  <a class="w3-bar-item w3-button" href="<?= site_url()?>/admin/vozilo">Возила</a>
  <a class="w3-bar-item w3-button" href="<?= site_url()?>/admin/tovar">Товари</a>
  <a class="w3-bar-item w3-button" href="<?= site_url()?>/admin/tura">Тури</a>
</nav>

<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:210px">
  <div class="w3-row w3-padding-10" style="margin-top:">
  </div>
  <script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>
</body>
</html>
<?php
echo $output;
$this->view('footer'); ?>

</div>
</div>

<?php
$currentURL = current_url();
$uloga=$this->session->userdata('uloga');
?>
<?php if ($currentURL==site_url('admin')) : ?>

<div class="w3-main" style="margin-left:210px">
  <div class="w3-row w3-padding-10">
<h2>Добрoдојдовте, вие сте логирани како "<?php echo $uloga; ?>" </h2>
</div>
</div>
<?php endif; ?>
