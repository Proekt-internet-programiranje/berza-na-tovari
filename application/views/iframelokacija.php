<?php $this->load->view('prevoznik');

echo '<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q='.$lat.','.$long.'&amp;key=AIzaSyBM6-9v7NMdMZrqh3aZBIzj-AimMGu-ENQ"></iframe>';

    $this->load->view('footer'); ?>