<?php

include "php/DB.php";

$db = new DB();
if ($db->createLink() == 0) {

    ?>

	<!DOCTYPE html>
    <html>
        <head>
            <title>Ошибка</title>
            <meta charset="utf-8">
        </head>
        <body>
            <p>Ошибка подключения к базе данных</p>
            <a href="index.php">Вернуться</a>
        </body>
    </html>

    <?php
} else {
    $db->setLocaleLink();
    $date = $_GET["year"]."-";
    if ($_GET["month"] < 10) {
        $date .= "0".$_GET["month"]."-";
    } else {
        $date .= $_GET["month"]."-";
    }
    if ($_GET["day"] < 10) {
        $date .= "0".$_GET["day"];
    } else {
        $date .= $_GET["day"];//." 08:00:00";
    }

    if ($_GET["day"] < 10) {
        $date2 = "0".$_GET["day"].".";
    } else {
        $date2 = $_GET["day"].".";//." 08:00:00";
    }
    if ($_GET["month"] < 10) {
        $date2 .= "0".$_GET["month"].".";
    } else {
        $date2 .= $_GET["month"].".";
    }
    $date2 .= $_GET["year"]; 
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <title><?php echo($date2); ?></title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="css/main.css">
            <script src="js/jquery-3.6.0.js"></script>
            <script src="js/popper.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </head>
        <body>
        <div class="container-fluid">
            <div class="row header">
                <div class="col-*-*">
                    <h1>Дата: <?php echo($date2); ?></h1>
                </div>
            </div>
            <div class="row content">
                <div class="col-*-*"> 

    <?php
    $db->setSQL("SELECT * FROM shedule WHERE date LIKE '$date%'");
    $sql_result = $db->getResult(); 
    $cc = $db->getNumRows();
    if ($cc > 0) {
        echo ("<div class='table-responsive'><table class='table table-bordered'><tr>");
        echo ("<td colspan='3' class='text-center'><h1>Расписание</h1><tr>");
        echo ("<td class='text-center' style='width:13%'>Время экзамена</td>");
        echo ("<td class='text-center' style='width:13%'>Предмет</td>");
        echo ("<td class='text-center' style='width:13%'>Специальности</td>");
        echo ("</tr><tr>");
        $tt7= $sql_result[1];
        $tt5= $sql_result[2];
        for ($j = 0; $j < $cc; $j++) {
            $test = $db->setRow();
            $tt7 .= ",".$test[1];
            $tt5 .= ",".$test[2];
        }
        $tt4 = explode(",",$tt7);
        $tt6 = explode(",",$tt5);
        for ($j = 0; $j < $cc; $j++) {
            echo ("<td class='text-center'><p>".mb_substr($tt6[$j],strpos($tt6[$j]," "))."</p></td>");
            $db->setSQL("SELECT * FROM subjects WHERE id = '$tt4[$j]'");
            $sql_result2 = $db->getResult(); 
            echo ("<td class='text-center'><p>".$sql_result2[1]."</p></td>");
            $db->setSQL("SELECT * FROM subjects_to_specialities WHERE id_subject = '$tt4[$j]'");
            $sql_result3 = $db->getResult()[1];
            $tt = $sql_result3;
            $cc2 = $db->getNumRows();
            if ($cc2 > 1) {
                for ($i = 0; $i < $cc2; $i++) {
                    $tt .= ",".$db->setRow()[1];
                }
                $tt2 = explode(",",$tt);
                $db->setSQL("SELECT * FROM specialities WHERE id = '$tt2[0]'");
                $sql_result4 = $db->getResult()[2];  
                $tt3 = $sql_result4;
                for ($i = 1; $i < $cc2; $i++) {
                    $db->setSQL("SELECT * FROM specialities WHERE id = '$tt2[$i]'");
                    $sql_result4 = $db->getResult()[2];  
                    $tt3 .= ", ".$sql_result4;
                }
            } else {
                $db->setSQL("SELECT * FROM specialities WHERE id = '$tt'");
                $sql_result4 = $db->getResult()[2];  
                $tt3 = $sql_result4;
            }

            echo ("<td class='text-center'><p>".$tt3."</p></td>");
            echo("</tr><tr>");
        }
        echo("</tr></table></div>");
    } else {
        echo ("<h1>Расписание</h1><h2>В данный день нет экзаменов</h2>");
    }
    ?>
    </div>
            </div>
            <div class="row footer">
                <div class="col-*-*"><p><a href="#">Github</a></p></div>
            </div>
        </div>
        </body>
    </html>
    <?php } ?>