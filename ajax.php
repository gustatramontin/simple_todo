<?php

require 'controller.php';
require 'view/main.php';
require 'model.php';
$controller = new Controller(new View(), new Model());

switch ($_GET['do']) {
    case 'addTodo':
        $controller->addTodo($_GET['val']);
        break;
    case 'removeTodo':
        $controller->removeTodo($_GET['val']);

}   