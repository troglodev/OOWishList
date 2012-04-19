<?php

require 'ConexionBaseDeDatos.php';

class Modelo {

    public function query() {
        //require 'ConexionBaseDedatos.php';
        $stmt = ConexionBaseDedatos::getInstance()->query("Select * from wishers");

        return $stmt->fetchAll();
    }

}

?>
