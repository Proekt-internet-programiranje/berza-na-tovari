<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Најава</title>
</head>
<body>
    <?php if(isset($_SESSION)) {
        echo $this->session->flashdata('flash_data');
    } ?>
 
    <form action="<?= site_url('najava') ?>" method="post">
        <label for="korisnicko_ime">Корисничко име</label>
        <input type="text" name="korisnicko_ime" />
        <label for="lozinka"></label>
        <input type="text" name="lozinka" />
        <button type="submit">Најави се</button>
    </form>
</body>
</html>