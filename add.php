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
    $date = $_POST["date"];
    $time = $_POST["time"];
    if ($date == "" || $time == "") {
        ?>

        <!DOCTYPE html>
        <html>
            <head>
                <title>Ошибка</title>
                <meta charset="utf-8">
            </head>
            <body>
                <p>Не заполнены все поля ввода</p>
                <a href="index.php">Вернуться</a>
            </body>
        </html>
    
        <?php
    } else {
        $subject = $_POST["subject"];
        $db->setSQL("SELECT * FROM subjects WHERE title = '$subject'");
        $sql_result = $db->getResult(); 
        $cc = $db->getNumRows();
        if ($cc > 0) {
            $id_sub = $sql_result[0];
            $tt = explode(".",$date);
            $tt_final = /*$tt[2]."-".$tt[1]."-".$tt[0]*/$date." ".$time.":00";
            $db->setSQL("INSERT INTO shedule (id_subject, date) VALUES ('$id_sub', '$tt_final')");
            $db->getResult(false);
            ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <title>Ошибка</title>
                    <meta charset="utf-8">
                </head>
                <body>
                    <p>Успешно добавлен экзамен по предмету <?php echo('"'.$subject.'" '.$date.' в '.$time); ?> </p>
                    <a href="index.php">Вернуться</a>
                </body>
            </html>
        <?php } else { ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <title>Ошибка</title>
                    <meta charset="utf-8">
                </head>
                <body>
                    <p>Предмет <?php echo('"'.$subject.'"'); ?> не найден в БД</p>
                    <a href="index.php">Вернуться</a>
                </body>
            </html>
    <?php } } } ?>