<?php $this->load->view('prevoznik'); ?>
<form action="<?= site_url('prevoznik/obraboti_vozac') ?>" method="post">
<div class="w3-card-4" style="margin-top: 10px">
    <div class="w3-container w3-light-grey">
      <h2>Избери возач за приказ</h2>
    </div>
    <form style="padding: 16px" action="<?= site_url('prevoznik/obraboti_vozac') ?>" method="post">
        <select name="vozac">
        <?php
            foreach($rezultat as $opcii)
            {
               echo '<option value="'.$opcii->id_vozac.'">'.$opcii->ime_vozac.'</option>';
            }
        ?>
            </select>
        <input type="submit" value="Види Локација">
    </form>
    </div>
<?php $this->load->view('footer'); ?>