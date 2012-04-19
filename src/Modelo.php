<?php

require 'BaseDeDatos.php';

class Modelo {

    public function query() {
        //require 'ConexionBaseDedatos.php';
        $db=new BaseDeDatos();
        $db->connect();
        $stmt=$db->select('wishes','*','wisher_id=62');       
                
                
                //BaseDedatos::getInstance()->query("Select * from wishers");

        return $stmt;
    }

}

?>
