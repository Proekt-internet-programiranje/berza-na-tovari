<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Најава</title>
  <link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet" type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="<?= base_url()?>pomosno/najava/css/style.css">
</head>
<body>
 
    
    <div class="form">
      <center>
          <h1>
           <?php if(isset($_SESSION)) {
           echo $this->session->flashdata('poraka');
           } ?>
         </h1> 
      </center>
      <ul class="tab-group">
        <li class="tab active"><a href="#login">Најава</a></li>
        <li class="tab"><a href="#signup">Регистрација</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="login">   
          <h1>Добредојде</h1>
          
          <form action="<?= site_url('najava') ?>" method="post">
          
            <div class="field-wrap">
            <label>
              Корисничко име<span class="req">*</span>
            </label>
            <input type="text" name="korisnicko_ime" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Лозинка<span class="req">*</span>
            </label>
            <input type="password" name="lozinka" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Заборавена лозинка?</a></p>
          
          <button class="button button-block">Најави се</button>
          
          </form>

        </div>
        <div id="signup">   
          <h1>Регистрација</h1>
          
          <form action="<?= site_url('najava/registracija') ?>" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Назив на компанија<span class="req">*</span>
              </label>
              <input type="text" name="imekompanija" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Даночен број<span class="req">*</span>
              </label>
              <input type="text" name="danocen_broj" required autocomplete="off"/>
            </div>
          </div>
            
                <div class="field-wrap">
                    <label>Тип на компанија<span class="req">*</span></label>
                </div>
                <div class="field-wrap">
                    <select name="tip_kompanija">
                        <option value="3">Шпедиција</option>
                        <option value="2">Превозник</option>
                    </select>
                </div> 
              
              
            <div class="field-wrap">
              <label>
                Емаил<span class="req">*</span>
              </label>
              <input type="email" name="email" required autocomplete="off"/>
            </div>
              
            <div class="field-wrap">
              <label>
                Адреса<span class="req">*</span>
              </label>
              <input type="text" name="adresa" required autocomplete="off"/>
            </div>
          
            <div class="field-wrap">
              <label>
                Телефон<span class="req">*</span>
              </label>
              <input type="text" name="telefon" required autocomplete="off"/>
            </div>

          <div class="field-wrap">
            <label>
              Корисничко име<span class="req">*</span>
            </label>
            <input type="text" name="korisnicko_ime" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Лозинка<span class="req">*</span>
            </label>
            <input type="password" name="lozinka" required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block">Продолжи</button>
          
          </form>

        </div>
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="<?= base_url()?>pomosno/najava/js/index.js"></script>
</body>
</html>