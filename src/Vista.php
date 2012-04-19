<?php

class Vista {

    static function showView($page, $result) {
        require 'mostrar' . $page . '.php';
    }

    static function editView($page) {
        require 'editar' . $page . '.php';
    }

}

?>
