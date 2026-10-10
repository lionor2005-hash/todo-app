const form = document.querySelector("#task-form");
const input = document.querySelector("#task-input");
const list = document.querySelector("#task-list");
const status = document.querySelector("#status");

function normalizeTask(value) {
    return value.trim();
}

// Добавляет одну задачу в список на странице.
// textContent (а не innerHTML) защищает от вставки HTML-кода в задачу.
function addTaskToList(title) {
    const li = document.createElement("li");
    li.textContent = title;
    li.className = "task";
    list.appendChild(li);
}

// Загружает сохранённые задачи из базы (GET-запрос к api.php).
async function loadTasks() {
    try {
        const response = await fetch("api.php");

        if (!response.ok) {
            throw new Error("Не удалось загрузить задачи");
        }

        const tasks = await response.json();
        tasks.forEach(function (task) {
            addTaskToList(task.title);
        });
    } catch (error) {
        status.textContent = "Не удалось загрузить задачи. Проверь PHP и подключение к базе.";
        console.error(error);
    }
}

// Отправляет новую задачу на сервер (POST-запрос к api.php).
form.addEventListener("submit", async function (event) {
    event.preventDefault();

    const taskText = normalizeTask(input.value);

    if (taskText === "") {
        status.textContent = "Введите название задачи";
        return;
    }

    try {
        const response = await fetch("api.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: new URLSearchParams({
                task: taskText
            })
        });

        if (!response.ok) {
            throw new Error("Не удалось сохранить задачу");
        }

        addTaskToList(taskText);
        status.textContent = "Задача сохранена";
        input.value = "";
    } catch (error) {
        status.textContent = "Ошибка сохранения. Проверь PHP и подключение к базе.";
        console.error(error);
    }
});

loadTasks();
