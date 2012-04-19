<?php

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

    public function update() {
        
    }

    public function insert() {
        
    }

    public function delete() {
        
    }

    public function remove() {
        
    }

    public function disconnect() {
        
    }

}

?>
