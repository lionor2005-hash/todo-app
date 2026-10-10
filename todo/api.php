<?php
try {
    require_once __DIR__ . '/config.php';

    // GET: вернуть все сохранённые задачи в формате JSON
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('Content-Type: application/json; charset=utf-8');

        $stmt = $pdo->query('SELECT id, title FROM tasks ORDER BY id ASC');
        echo json_encode($stmt->fetchAll(), JSON_UNESCAPED_UNICODE);
        exit;
    }

    header('Content-Type: text/plain; charset=utf-8');

    // Всё, кроме GET и POST, не поддерживается
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        exit('Ожидается GET или POST-запрос.');
    }

    // POST: сохранить новую задачу
    $task = trim($_POST['task'] ?? '');

    if ($task === '') {
        http_response_code(400);
        exit('Название задачи пустое.');
    }

    if (mb_strlen($task) > 200) {
        http_response_code(400);
        exit('Название задачи слишком длинное.');
    }

    // prepare + параметр :title защищает от SQL-инъекций
    $stmt = $pdo->prepare(
        'INSERT INTO tasks (title) VALUES (:title)'
    );
    $stmt->execute(['title' => $task]);

    echo 'OK';

} catch (Throwable $e) {
    error_log($e->getMessage());
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Ошибка на сервере. Проверь настройки PHP и базы данных.';
}
