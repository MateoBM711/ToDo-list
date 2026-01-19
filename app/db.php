<?php
function connectDB()
{
    return new PDO('mysql:host=localhost;dbname=db_tasks;charset=utf8', 'root', '');
}

function getTasks()
{
    $db = connectDB();
    $query = $db->query('SELECT * FROM task');
    $query->execute();

    $tasks = $query->fetchAll(PDO::FETCH_OBJ);

    return $tasks;
}

function insertTask($title, $priority)
{
    $db = connectDB();

    $query = $db->prepare("INSERT INTO task (title, priority) VALUES (?,?)");
    $query->execute([$title, $priority]);
}
function removeTask($id)
{
    $db = connectDB();
    $query = $db->prepare("DELETE FROM task WHERE id_task=?");
    $query->execute([$id]);
}
function completedTask($id) 
{
    $db = connectDB();
    $query = $db->prepare("UPDATE task SET completed=1 WHERE id_task=?");
    $query->execute([$id]);
}
