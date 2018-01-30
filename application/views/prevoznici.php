<?php $this->load->view('spedicija'); ?>
<div class="w3-card-4" style="margin-top: 10px">
    <div class="w3-container w3-light-grey">
      <h2>Избери превозник за турата</h2>
    </div>
    <form style="padding: 16px" action="<?php echo site_url('spedicija/obraboti_prevoznikid'); ?>" method="post">
        <select name="prevoznik">
        <?php
            foreach($prevoznik as $opcii)
            {
               echo '<option value="'.$opcii["id"].'">'.$opcii["naziv"].'</option>';
            }
        ?>
            </select>
        <input type="submit" value="Избери">
    </form>
    </div>
<?php $this->load->view('footer'); ?>