<?php

/*
 * TODO
 * 
 * Refactorizar :D
 *      -insert
 *      -update
 * 
 * Añadir mas validaciones (pej. para no ejecutar consulta si no existe tabla)
 * 
 * Mejorar gestion de errores ¿Una clase nueva?
 *      -Generar log de errores
 * 
 * Utilizar prepare y Quote
 * 
 * 
 */

class BaseDeDatos {

    private $db_type = 'mysql';
    private $db_host = 'localhost';
    private $db_name = 'wishlist';
    private $db_user = 'user_wishlist';
    private $db_password = 'user_wishlist';
    private $dbh;

    const TYPE_SELECT = 1;
    const TYPE_INSERT = 2;
    const TYPE_UPDATE = 3;
    const TYPE_DELETE = 4;

    private function showError($e, $sql = null) {
        echo '<h4 style=color:red>Error en BaseDeDatos</h4><br/>';
        //***** Solo para desarrollo *******************************************
        echo 'Codigo: ' . $e->getCode() . '<br/>';
        echo 'L&iacute;nea: ' . $e->getLine() . '<br/>';
        echo 'Mensaje: ' . $e->getMessage() . '<br/>';
        if ($this->dbh != false)
            echo 'consulta= ' . $sql . '<br/>';
        //**********************************************************************
    }

    public function connect() {
        $dsn = $this->prepararDSN();
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        try {
            $this->dbh = new PDO($dsn, $this->db_user, $this->db_password, $options);
            return $this->dbh;
        } catch (PDOException $e) {
            $this->showError($e);
            die;
        }
    }

    public function select($table, $fields = '*', $where = null, $order = null) {
        $sql = $this->prepareQuery($this::TYPE_SELECT, $table, $where, $fields, $order);
        try {
            return $this->dbh->query($sql);
        } catch (PDOException $e) {
            $this->showError($e, $sql);
            return false;
        }
    }

    public function delete($table, $where) {
        $sql = $this->prepareQuery($this::TYPE_DELETE, $table, $where);
        try {
            return $this->dbh->exec($sql);
        } catch (PDOException $e) {
            $this->showError($e, $sql);
            return false;
        }
    }

    public function insert($table, $values, $rows = null) {
        //insert into wishers values (null,'pepitoeldelospalotes','blabla');
        $sql = 'INSERT INTO ' . $table;
        if ($rows != null)
            $sql .= ' (' . $rows . ')';


        for ($i = 0; $i < count($values); $i++) {
            if ($values[$i] == 'null') {
                $values[$i] = 'null';
                continue;
            }
            if (is_string($values[$i]))
            //Añadir Quote!!!!
                $values[$i] = '"' . $values[$i] . '"';
        }
        $values = implode(',', $values);
        $sql .= ' VALUES (' . $values . ')';

        try {
            return $this->dbh->exec($sql);
        } catch (PDOException $e) {
            $this->showError($e, $sql);
            return false;
        }
    }

    public function update($table, $rows, $where) {

        $sql = 'UPDATE ' . $table . ' SET ';

        $keys = array_keys($rows);
        for ($i = 0; $i < count($rows); $i++) {
            if (is_string($rows[$keys[$i]])) {
                $sql .= $keys[$i] . '="' . $rows[$keys[$i]] . '"';
            } else {
                $sql .= $keys[$i] . '=' . $rows[$keys[$i]];
            }

            if ($i != count($rows) - 1)
                $sql .= ',';
        }
        $cad = '';
        $keys = array_keys($where);
        for ($i = 0; $i < count($where); $i++) {
            if (is_string($where[$keys[$i]])) {
                $cad .= $keys[$i] . '="' . $where[$keys[$i]] . '"';
            } else {
                $cad .= $keys[$i] . '=' . $where[$keys[$i]];
            }

            if ($i != count($where) - 1)
                $cad .= ',';
        }

        $sql .= ' WHERE ' . $cad;
        try {
            return $this->dbh->exec($sql);
        } catch (PDOException $e) {
            $this->showError($e, $sql);
            return false;
        }
    }

    public function disconnect() {
        
    }

    private function prepararDSN() {
        return $this->db_type . ':host=' . $this->db_host . ';dbname=' . $this->db_name;
    }

    private function prepareQuery($type, $t, $w = null, $f = '*', $o = null) {
        switch ($type) {
            case ($type == $this::TYPE_SELECT):
                return $this->prepareSelect($t, $f = '*', $w = null, $o = null);
            case ($type == $this::TYPE_DELETE):
                return 'DELETE FROM ' . $t . ' WHERE ' . $w;

            default: echo'error';
        }
    }

    private function prepareSelect($t, $f = '*', $w = null, $o = null) {
        $sql = 'SELECT ' . $f . ' FROM ' . $t . ' ';
        if ($w)
            $sql.='WHERE ' . $w . ' ';
        if ($o)
            $sql.= 'ORDER BY ' . $o;
        return $sql;
    }

}

?>
