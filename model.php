<?php

class Model {
    
    private string $data_cookie;

    function __construct() {
        if ( !isset($_COOKIE['simple-todo_todos']))  {

            $lang = $this->detect_lang();

            $example = [
                "pt" => "Lavar a louça",
                "en" => "Wash the dishes"
            ];

            $this->set_cookie($example[$lang]);

            $this->cookies = $example[$lang];

            $this->configs = date('d-m-Y'); // end 

        } else {
            $this->cookies = $_COOKIE['simple-todo_todos'];
            $this->configs = $_COOKIE['simple-todo_todos-config'];

        }

    }

    function detect_lang() {
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $acceptLang = ['en', 'pt']; 
        $lang = in_array($lang, $acceptLang) ? $lang : 'en';

        return $lang;
    }

    function getTodos() {
        $todos = str_replace('-_', ' ', $this->cookies);
        $todos = explode('~~', $todos);

        return $todos;
    }

    function getTodosConfig() {
        $config = explode('~~', $this->cookies);
    }

    function set_cookie($cookie) {
        $new_cookie = str_replace(' ', '-_', $cookie);

        setcookie('simple-todo_todos', $new_cookie);
    }

    function set_config($config) {
        setcookie('simple-todo_todos-config', $config);
    }

    function addTodo($text) {
        $current_todos = $this->cookies;
        $new_cookie = $current_todos . '~~' . $text;

        $this->setNullConfig();

        $this->set_cookie($new_cookie);
    }

    function setNullConfig() {
        $current_configs = $this->configs;
        $new_config = $current_configs . '~~' . '';

        $this->set_config($new_config);
    }

    function setConfig($config, $todo) {
        
        $configs = $this->getTodosConfig();
        $todos = $this->getTodos();

        $index = array_search($todo, $todos);

        $configs[index] == $config;

        $new_config = implode('~~', $configs);

        $this->set_config($new_config);
    }

    function removeTodo($text) {
        $array_todos = $this->getTodos();

        $new_cookie = '';
        echo var_dump($array_todos) . $text;
        foreach($array_todos as $todo) {
            if ($todo !== $text) {
                $new_cookie .= $todo . '~~';
            }
        }
        $new_cookie = substr($new_cookie, 0, -2);
        $this->set_cookie($new_cookie);
    }
}