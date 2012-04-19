<?php

/**
 * Description of ConexionBaseDedatos
 *
 * @author federico
 */
class BaseDeDatos {
    
    public function connect(){}
    public function select(){}
    public function update(){}
    public function insert(){}
    public function delete(){}
    public function remove(){}
    public function disconnect(){}

    //put your code here
    private static $connector = 'mysql';
    private static $host = 'localhost';
    private static $dbname = 'wishlist';
    private static $dbuser = 'root';
    private static $dbpassword = '';
    private static $instance = NULL;

    private function __construct() {
        
    }

    /**
     *
     * Return DB instance or create intitial connection
     *
     * @return object (PDO)
     *
     * @access public
     *
     */
    public static function getInstance() {

        if (!self::$instance) {
            $dsn = self::$connector . ':host=' . self::$host . ';dbname=' . self::$dbname;
            self::$instance = new PDO($dsn, self::$dbuser, self::$dbpassword);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }

    private function __clone() {
        
    }

}

?>
