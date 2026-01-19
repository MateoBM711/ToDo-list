<?php
require_once 'app/tasks.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // accion por defecto si no se envia ninguna
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);
// endpoints
// list --> lista de tareas --> showTasks()
// add --> agregar tarea --> addTask()
// delete/:ID --> removeTask($id)
switch ($params[0]) {
    case 'home':
        showTasks();
        break;
    case 'add':
        addTask();
        break;
    case 'delete':
        removeTask($params[1]);
        break;
    case 'completed':
        completedTask($params[1]);
        break;
    default:
    break;
}