<?php

class Controlador {

    public $controller;

    public function __construct($i) {
        switch ($i) {
            case 'usuario':
                $this->controller = $i;
                break;
            case 'inicio':
                $this->controller = $i;
                break;
            default:
                $this->controller = false;
        }
    }

    public function mostrar() {
        require 'Modelo.php';
        require 'Vista.php';

        //Modelo::;
        $modelo = new Modelo();
        $result = $modelo->query();

        Vista::showView($this->controller, $result);
        //echo 'hola';
    }

    public function crear() {
        require 'Vista.php';
        Vista::editView($this->controller);
    }

}

?>
