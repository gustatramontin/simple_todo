<?php

class View {
    function __construct() {

    }

    function show_main_page($todos, $lang) {
        require 'view/pages/index.php';
        
    }
}