<?php
require_once 'app/db.php';


function showTasks()
{
    require 'templates/layouts/header.php';

    $tasks = getTasks();
?>
    <div class="card mx-5 mb-2">
        <div class="card-body p-0">
            <h5 class="card-header">Agregar Tarea</h5>
            <form action="add" method="POST">
                <div class="mb-3 d-flex justify-content-center align-items-center my-4">
                    <input type="text" class="form-control mx-2" name="title" placeholder="Nueva Tarea" style="max-width: 400px;" required>
                    <select class="form-select mx-2" name="priority" style="max-width: 150px;" required>
                        <option value="" disabled selected>Prioridad</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <button type="submit" class="btn btn-primary mx-2">Agregar</button>
                </div>
        </div>
        </form>
    </div>
    <div class="card mx-5 mb-2">
        <div class="card-body p-0">
            <h5 class="card-header">Tus Tareas</h5>
            <ul class="list-group list-group-flush mx-auto" style="max-width: 800px;">
                <?php foreach ($tasks as $task) { ?>
                    <li class="list-group-item d-flex justify-content-start align-items-center">
                        <a href="completed/<?php echo $task->id_task?>" type="button" class="check-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
                            </svg>
                        </a>
                        <?php if ($task->completed == 1) { ?>
                            <span class="ms-3 text-decoration-line-through text-muted"><?php echo $task->title; ?> | Prioridad: <?php echo $task->priority; ?></span>
                        <?php } else { ?>
                            <span class="ms-3"><?php echo $task->title; ?> | Prioridad: <?php echo $task->priority; ?></span>
                        <?php } ?>
                    </li>
                <?php
                } ?>
            </ul>
        </div>
    </div>
<?php
    require 'templates/layouts/footer.php';
}
function addTask()
{
    $title = $_POST['title'];
    $priority = $_POST['priority'];

    $id = insertTask($title, $priority);
    if ($id) {
        header("Location: " . BASE_URL);
        exit();
    }
}
function deleteTask($id)
{
    removeTask($id);
    header("location: " . BASE_URL);
    exit();
}
function completeTask($id)
{
    $task = completedTask($id);
    header("location: " . BASE_URL);
    exit();
}
