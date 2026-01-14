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

    $query =$db->prepare("INSERT INTO task (title, priority) VALUES (?,?)");
    $query->execute([$title, $priority]);
    
}