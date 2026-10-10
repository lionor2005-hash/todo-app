# To-Do list (учебный проект / learning project)

Выставите язык описания / Choose description language:
- [Русский (Russian)](#русская-версия)
- [English](#english-version)

---

## Русская версия

Небольшое веб-приложение: добавление задач и хранение их в MySQL.
**Стек:** HTML, CSS, JavaScript (fetch), PHP (PDO), MySQL.

###  Как это работает
1. Пользователь вводит задачу в форму, JavaScript перехватывает отправку (`preventDefault()`).
2. `fetch` отправляет задачу POST-запросом в `api.php`.
3. PHP проверяет данные (не пусто, не длиннее 200 символов) и сохраняет их в MySQL через подготовленный запрос (`prepare`), чтобы исключить SQL-инъекции.
4. Сервер отвечает статусом (200, 400, 405 или 500), а JS показывает пользователю результат.
5. При открытии страницы JS делает GET-запрос к `api.php` и выводит сохраненные задачи.

###  Запуск локально (XAMPP)
1. Запустить **Apache** и **MySQL** в XAMPP.
2. Скопировать папку проекта в `C:\xampp\htdocs\todo`.
3. Открыть phpMyAdmin (`http://localhost/phpmyadmin/`) и импортировать файл `schema.sql`.
4. Открыть в браузере: `http://localhost/todo/`.

> **Настройки подключения к базе** лежат в `config.php` (по умолчанию для XAMPP: пользователь `root`, пароль пустой).

###  Что можно улучшить
- Удаление и отметка выполненных задач.
- Редактирование задач.
- Вынести пароль БД из кода в отдельный конфиг, который не попадает в Git.

---

## English Version

A simple web application for adding tasks and storing them in a MySQL database.
**Tech Stack:** HTML, CSS, JavaScript (fetch), PHP (PDO), MySQL.

###  How It Works
1. The user enters a task into the form; JavaScript intercepts the submission using `preventDefault()`.
2. `fetch` sends the task to `api.php` via a POST request.
3. PHP validates the data (ensures it is not empty and under 200 characters) and saves it to MySQL using a prepared statement (`prepare`) to prevent SQL injections.
4. The server responds with an HTTP status code (200, 400, 405, or 500), and JS displays the result to the user.
5. Upon page load, JS sends a GET request to `api.php` and renders the saved tasks.

###  Local Setup (XAMPP)
1. Start **Apache** and **MySQL** in the XAMPP Control Panel.
2. Copy the project folder to `C:\xampp\htdocs\todo`.
3. Open phpMyAdmin (`http://localhost/phpmyadmin/`) and import the `schema.sql` file.
4. Open your browser and navigate to: `http://localhost/todo/`.

> **Database connection settings** are located in `config.php` (default XAMPP credentials: user `root`, empty password).

###  Future Improvements
- Task deletion and marking tasks as completed.
- Task editing functionality.
- Moving database credentials out of the source code into a separate configuration file excluded from Git.
