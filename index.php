<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Расписание экзаменов ПГУ</title>
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
                    <h1>Расписание экзаменов ПГУ</h1>
                </div>
            </div>
            <div class="row content">
                <div class="col-*-*">
                    <h1>Календарь</h1>
                    <script src="js/calendar.js"></script>
                </div>
            </div>
            <div class="row form">
                <div class="col-*-* text-center"><br><hr><br><h1>Форма</h1>
                    <form action="add.php" method="POST" name="addform">
                        <div class="form-group">
                            <label>Дата проведения экзамена: </label>
                            <input name="date" type="date" placeholder="01.07.2021"><br><br>
                            <label>Время проведения экзамена: </label>
                            <input name="time" type="time" placeholder="08:00:00"><br><br>
                            <label>Выберите предмет: </label>
                            <select name="subject"> 

<?php
    include "php/DB.php";

    $db = new DB();
    if ($db->createLink() == 0) {
        echo ("<option selected>Ошибка подключения к базе данных</option>");
    } else {
        $db->setLocaleLink();
        $db->setSQL("SELECT * FROM subjects");
        $sql_result = $db->getResult()[1]; 
        $cc = $db->getNumRows();
        if ($cc > 0) {
            echo ("<option selected>$sql_result</option>");
            for ($i = 1; $i < $cc; $i++) {
                echo ("<option>".$db->setRow()[1]."</option>");
            }
        } else {
            echo ("<option selected>Предметы не созданы</option>");
        }
    }

?>
                            </select><br>
                            <br><button type="submit" class="btn btn-primary">Добавить</button><br><br>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row footer">
                <div class="col-*-*"><p><a href="https://github.com/Jebvo777/Test-task-for-PGU.git">Github</a></p></div>
            </div>
        </div>
    </body>
</html>