<?php

class Controller {
    
    private object $view;
    private object $model;

    function __construct($view, $model) {
       $this->view = $view;
       $this->model = $model;
    }

    function show_main_page() {
        
        $this->view->show_main_page(
            todos: $this->model->getTodos(),
            lang: $this->model->detect_lang()
        );
    }

    function addTodo($text) {
        $this->model->addTodo($text);
    }

    function removeTodo($text) {
        $this->model->removeTodo($text);

    }
}