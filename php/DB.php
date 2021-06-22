<?php
/*------------------------------
Модуль: Движок базы данных
Версия: 0.1
Автор: Шилов Алексей
------------------------------*/

class DB {

    private $db_link = "localhost";
    private $db_login = "TestPGU";
    private $db_password = "112233445566";
    private $db_name = "shedule_ex";
    private $link = null;
    private $sql = null;
    private $result = null;
    private $last_row = null;
    private $nums_row = null;

    public function createLink() { //Открытие соединения с базой данных
        $this->link = mysqli_connect($this->db_link, $this->db_login, $this->db_password, $this->db_name);
        if (mysqli_connect_errno()) { //Если ошибка при подключении к базе данных
            return 0;
        } else {
            return 1;
        }
    }

    public function setLocaleLink() { //Установка локализации базы данных
        mysqli_query($this->link, "SET NAMES 'utf8'");
        return 1;
    }

    public function setSql($sql_request) { //Установка запроса
        $this->sql = $sql_request;
        return 1;
    }

    public function getResult($flag = true) { //Получение результата в форме массива строк
        $this->result = mysqli_query($this->link, $this->sql);
        if ($flag) {
            $row = $this->setRow();
            return $row;
        } else {
            return 1;
        }
    }

    public function setRow() { //Установка следующей строки
        $row = mysqli_fetch_row($this->result);
        $this->last_row = $row;
        return $row;
    }

    public function getNumRows() { //Получение количества строк
        $this->nums_row = mysqli_num_rows($this->result);
        return $this->nums_row;
    }

    public function closeConnection($flag = false) { //Безопасное закрытие соединения
        mysqli_free_result($this->result);
        mysqli_close($this->link);
        if ($flag) $this->unsetData();
        return 1;
    }

    public function unsetData() { //Обнуление данных сессии
        $this->link = null;
        $this->sql = null;
        $this->result = null;
        $this->last_row = null;
        $this->nums_row = null;
        return 1;
    }
}