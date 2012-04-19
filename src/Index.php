<?php

/**
 * Description of Index
 *
 * @author federico
 */
class Index {

    public $controller;
    public $action;

    public function run() {
        $this->setController();
        $this->setAction();

        self::callController($this->controller, $this->action);
    }

    public function callController($c, $a) {
        require_once 'Controlador.php';
        $controller = new Controlador($c);

        if ($controller->controller != false) {
            if (method_exists($controller, $a . '')) {
                $controller->$a();
            } else {
                echo 'Error: ' . $this->action . ' no es una accion';
            }
        } else {
            echo 'Error: La página no existe.';
        }
    }

    public function setController() {
        if (isset($_GET['controlador'])) {
            $this->controller = $_GET['controlador'];
        } else {
            // echo 'Utilizo "inicio"<br/>';
            $this->controller = 'inicio';
        }
    }

    public function setAction() {
        if (isset($_GET['accion'])) {
            $this->action = $_GET['accion'];
        } else {
            //echo 'Utilizo "mostrar"<br/>';
            $this->action = 'mostrar';
        }
    }

}

$pagina = new Index();
$pagina->run();
?>
