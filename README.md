# Test-task-for-PGU
Тестовое задание "Расписание экзаменов ПГУ" для трудоустройства. Выполнил: Шилов Алексей (Jebvo)

# Руководство пользователя
Для того чтобы открыть созданное веб-приложение, необходимо перейти по <a href="jv-lab.ru/work/test">ссылке</a>. <br>
Перед пользователем отобразится следующее окно экрана.<br><br>
![image](https://user-images.githubusercontent.com/86295844/122908446-ca55ba80-d35c-11eb-9e2f-5d879c6194ce.png) <br><br>
Данное окно состоит из двух основных функциональных частей:<br>
<b>Календарь<br>
Форма добавления записи<br></b>
Календарь формируется автоматически на текущий месяц. Дни, представленные в таблице представляют из себя ссылки на переход на конкретный день. При нажатии на день, осуществляется переход на страницу выбранного дня. В случае если на данный день не запланировано проведение экзаменов, окно будет представлено следующим образом.<br><br>
![image](https://user-images.githubusercontent.com/86295844/122909615-0b020380-d35e-11eb-95c3-5d42de6b1a04.png) <br><br>
В случае, если в выбранный день экзамены проводятся, окно будет выглядеть следующим образом:<br><br>
![image](https://user-images.githubusercontent.com/86295844/122911944-7e0c7980-d360-11eb-9a94-c613c2dd6a56.png) <br><br>
Для добавления новой записи в расписание, необходимо заполнить поля ввода и нажать кнопку "Добавить". В случае возникновения ошибок (не все поля ввода заполнены, ошибка подключения к БД), и в случае успешного добавления - будет выведено соответствующее сообщение.

# Используемые технологии
HTML + CSS + Bootstrap - верстка страниц<br>
PHP - обработчик со стороны сервера<br>
JS + JQuery - работа с клиентом<br>
MySQL - СУБД<br>
PHPMyAdmin - средство работы с СУБД<br>
Visual Studio Code - среда для написания кода<br>

# Дополнительный софт
Bootstrap - сторонний фреймворк<br>
DB.php - собственная библиотека для работы с БД<br>
JQuery - сторонняя библиотека<br>

# Дерево файлов
index.php - основная страница приложения<br>
date.php - страница выбранного дня<br>
add.php - страница добавления записи<br>
css/ - папка со стилями (пользовательские стили в main.css)<br>
js/ - папка со скриптами JS (пользовательский скрипт для генерации календаря - calendar.js)<br>
php/ - папка со скриптами PHP (пользовательская библиотека для работы с БД - DB.php)<br>
SQL database/ - папка с дампом БД (DB(with data).sql - файл с структурой и данными, DB(without data).sql - файл только со структурой))<br>

# Автор
Шилов Алексей (Jebvo) - <a href="https://vk.com/jebvo">ВК</a>
