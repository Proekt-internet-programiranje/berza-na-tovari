<?php $this->load->view('spedicija'); ?>
    <form action="<?php echo site_url('spedicija/obraboti_prevoznikid'); ?>" method="post">
        <select name="prevoznik">
        <?php
            foreach($prevoznik as $opcii)
            {
               echo '<option value="'.$opcii["id"].'">'.$opcii["naziv"].'</option>';
            }
        ?>
            </select>
        <input type="submit" value="Испрати">
    </form>
<?php $this->load->view('footer'); ?>