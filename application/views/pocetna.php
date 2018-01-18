<!DOCTYPE html>
<html>
    <head>
        <title>Почетна</title>
    </head>
    <body>
        <h1>Добредојде <?= $this->session->userdata('korisnicko_ime') ?></h1>
        <a href="<?= site_url('pocetna/odjavi_se') ?>">Одјави се</a>
    </body>
</html>