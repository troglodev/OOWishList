<?php

/*
 * TODO
 * 
 * Refactorizar :D
 * Añadir mas validaciones (pej. para no ejecutar consulta si no existe tabla)
 * 
 * Mejorar gestion de errores ¿Una clase nueva?
 * 
 * Utilizar prepare y Quote
 */

class BaseDeDatos {

    private $db_type = 'mysql';
    private $db_host = 'localhost';
    private $db_name = 'wishlist';
    private $db_user = 'user_wishlist';
    private $db_password = 'user_wishlist';
    private $dbh;

    public function connect() {
        $dsn = $this->db_type . ':host=' . $this->db_host . ';dbname=' . $this->db_name;
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        try {
            $this->dbh = new PDO($dsn, $this->db_user, $this->db_password, $options);
            return $this->dbh;
        } catch (PDOException $e) {
            echo 'Error accediendo a la Base de Datos<br/>';
            echo 'Codigo: ' . $e->getCode() . '<br/>';
            echo 'L&iacute;nea: ' . $e->getLine() . '<br/>';
            return false;
        }
    }

    public function select($table, $fields = '*', $where = null, $order = null) {
        $sql = 'SELECT ' . $fields . ' ';
        $sql.='FROM ' . $table . ' ';
        if ($where) {
            $sql.='WHERE ' . $where . ' ';
        }
        if ($order) {
            $sql = 'ORDER BY ' . $order;
        }

        try {
            return $this->dbh->query($sql);
        } catch (PDOException $e) {
            echo 'Error consultando la Base de Datos<br/>';
            echo 'Codigo: ' . $e->getCode() . '<br/>';
            echo 'L&iacute;nea: ' . $e->getLine() . '<br/>';
            echo 'consulta= _' . $sql;
            return false;
        }
    }

    public function insert($table, $values, $rows = null) {

//insert into wishers values (null,'pepitoeldelospalotes','blabla');
        $sql = 'INSERT INTO ' . $table;
        if ($rows != null) {
            $sql .= ' (' . $rows . ')';
        }

        for ($i = 0; $i < count($values); $i++) {
            if ($values[$i] == 'null') {
                $values[$i] = 'null';
                continue;
            }
            if (is_string($values[$i])) {
//Añadir Quote!!!!
                $values[$i] = '"' . $values[$i] . '"';
            }
        }
        $values = implode(',', $values);
        $sql .= ' VALUES (' . $values . ')';

        try {
            return $this->dbh->exec($sql);
        } catch (PDOException $e) {
            echo 'Error insertando registro<br/>';
            echo 'Codigo: ' . $e->getCode() . '<br/>';
            echo 'L&iacute;nea: ' . $e->getLine() . '<br/>';
            echo 'consulta= _' . $sql;
            return false;
        }
    }

    public function update($table, $rows, $where) {

        $update = 'UPDATE ' . $table . ' SET ';
        /*
          echo '#01 //';
          print_r($where);
          for ($i = 0; $i < count($where); $i++) {
          if ($i % 2 != 0) {
          if (is_string($where[$i])) {
          if (($i + 1) != null)
          $where[$i] = '"' . $where[$i] . '" AND ';
          else
          $where[$i] = '"' . $where[$i] . '"';
          }
          }
          }
          echo '#02 //';
          print_r($where);
          $where = implode('', $where);
          echo '#03 //';
         * */


        //  print_r($where);


        $keys = array_keys($rows);
        for ($i = 0; $i < count($rows); $i++) {
            if (is_string($rows[$keys[$i]])) {
                $update .= $keys[$i] . '="' . $rows[$keys[$i]] . '"';
            } else {
                $update .= $keys[$i] . '=' . $rows[$keys[$i]];
            }

// Parse to add commas
            if ($i != count($rows) - 1) {
                $update .= ',';
            }
        }
        $cad = '';
        $keys = array_keys($where);
        for ($i = 0; $i < count($where); $i++) {
            if (is_string($where[$keys[$i]])) {
                $cad .= $keys[$i] . '="' . $where[$keys[$i]] . '"';
            } else {
                $cad .= $keys[$i] . '=' . $where[$keys[$i]];
            }

// Parse to add commas
            if ($i != count($where) - 1) {
                $cad .= ',';
            }
        }



        $update .= ' WHERE ' . $cad;
        try {
            return $this->dbh->exec($update);
        } catch (PDOException $e) {
            echo 'Error actualizando registro<br/>';
            echo 'Codigo: ' . $e->getCode() . '<br/>';
            echo 'L&iacute;nea: ' . $e->getLine() . '<br/>';
            echo 'Mensaje: ' . $e->getMessage() . '<br/>';
            echo 'consulta= _' . $update;
            return false;
        }
    }

    public function delete($table, $where) {
        $sql = 'DELETE FROM ' . $table . ' ';
        $sql.='WHERE ' . $where;
        try {
            return $this->dbh->exec($sql);
        } catch (PDOException $e) {
            echo 'Error eliminando registro<br/>';
            echo 'Codigo: ' . $e->getCode() . '<br/>';
            echo 'L&iacute;nea: ' . $e->getLine() . '<br/>';
            echo 'consulta= _' . $sql;
            return false;
        }
    }

    public function disconnect() {
        
    }

}

?>
