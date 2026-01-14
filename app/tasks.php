<?php
require_once 'app/db.php';


function showTasks()
{
    require 'templates/layouts/header.php';

    $tasks = getTasks();
?>
    <div class="card">
    <div class="card-body">
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
    <div class="card">
        <div class="card-body">
            <h5 class="card-header">Tus Tareas</h5>
            <ul class="list-group list-group-flush mx-auto" style="max-width: 800px;">
                <?php foreach ($tasks as $task) { ?>
                    <li class="list-group-item d-flex justify-content-start align-items-center">
                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                        <span class="ms-3"><?php echo $task->title; ?> | Prioridad: <?php echo $task->priority; ?></span>
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
    if($id){
        header("Location: " . BASE_URL);
        exit();
    }
}
