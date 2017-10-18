<?php session_start();
$ime= $_POST["ime"];
$prezime= $_POST["prezime"];
$brindex= $_POST["brindex"];
$fakultet= $_POST["fakultet"];

$nizaodsite = array($ime,$prezime,$brindex,$fakultet);
$zaedno = implode(" ", $nizaodsite);

$baza = fopen("podatoci.txt", "a") or die ("Фајлот не може да се отвори");
fwrite($baza, $zaedno . "\n");
fclose($baza);


        $baza= fopen("podatoci.txt" , "r") or die("Фајлот не може да се отвори");
        $linija = fgets($baza);
        $brojac = 0;
        
        while(! feof($baza))
        {
            echo $linija. "<br />";
            $linija = fgets($baza);
            $brojac = $brojac+1;
            
        }
        echo "Има запишано вкупно $brojac податоци";
        $_SESSION['brojac'] = $brojac;
        fclose($baza); 
?>