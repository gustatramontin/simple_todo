<?php

require 'controller.php';
require 'view/main.php';
require 'model.php';

$view = new View();
$model = new Model();

$controller = new Controller($view, $model);

$controller->show_main_page();