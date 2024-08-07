<?php

declare(strict_types=1);

$task = new Task();

Router::get('/',fn() => require 'view/pages/home.php');

Router::get('/todos',fn() => require 'view/pages/todos.php');
Router::post('/todos',fn() => require 'controllers/addNewTask.php');
Router::get('/todos/delete',fn() => require 'controllers/deleteTask.php');
Router::get('/todos/complete',fn() => require 'controllers/completeTask.php');
Router::get('/todos/uncompleted',fn() => require 'controllers/uncompletedTask.php');


Router::get('/notes',fn() => require 'view/pages/notes.php');

Router::get('/login',fn() => require 'view/pages/auth/login.php');
Router::post('/login',fn() => (new User())->login($_POST['email'],$_POST['password']));

Router::get('/logout',fn() => (new User())->logout());

Router::get('/register',fn() => require 'view/pages/auth/register.php');
Router::post('/register',fn() => (new User())->register($_POST['email'],$_POST['password']));// new user obekt olyatgandan kiyin qavis quyish shartmi?


Router::errorResponse(404,'Not Found');
