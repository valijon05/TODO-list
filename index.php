<?php
require 'DB.php';
require 'Todo.php';

$pdo    = DB::connect();
$todo = new Todo($pdo);



if(!empty($_POST)){
    if(strlen($_POST['text'])){
        $todo->setTodo($_POST['text']);
        header('Location: index.php'); 
    }
}
require 'view.php';
?>



