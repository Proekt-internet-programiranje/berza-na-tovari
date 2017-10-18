
<?php session_start();

//cika carr
//weed
//zbrceeeeed
//////////////cikaaa
if(isset($_SESSION["brojac"]))
$zapisani = $_SESSION["brojac"]; ?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <title>
            Проба разбираш
        </title>
    </head>
    <body>
        <?php
            if(!isset($zapisani)){
                echo "<div class='alert alert-info'>
                        <strong>Нема записи!</strong> Нема записи или не се исчитани. Ве молиме внесете запис и пробајте повторно
                        </div>";
            }
            else{
                echo "<div class='alert alert-success'>
                        <strong>Има вкупно $zapisani записи</strong>
                        </div>";
            }
        ?>
        <center>
        <form method="post" action="process.php" style="width:35%;">
            <label>Име : </label> 
            <input type=text name="ime" class="form-control"><br>
            <label>Презиме : </label>      
            <input type=text name="prezime" class="form-control"><br>
            <label>Број на индекс : </label>
            <input type=text name="brindex" class="form-control"><br>
            <label>Факултет : </label> <br>      
                <select name="fakultet" class="form-control">
                    <option value="informatika">Информатика</option>
                    <option value="rudarski">Рударски</option>
                    <option value="biznis">Бизнис и логистика</option>
                </select>
            <br>
            <input type="submit" value="Прати" class="btn btn-success">
        </form>
            </center>
    </body>
</html>

