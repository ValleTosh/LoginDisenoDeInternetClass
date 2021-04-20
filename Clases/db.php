<?php 
class DB {
    protected static $con;
    private function __construct(){
        try {
            self::$con = new PDO('mysql:charset=utf8mb4;host=localhost;port=3306;dbname=login','root','');
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$con->setAttribute(PDO::ATTR_PERSISTENT, false);
        } catch (PDOException $e) {
            echo "No se ha podido conectar a la base de datos";
            exit;
        }
    }

    public static function getCon(){
        if (!self::$con) {
            new DB();
        }
        return self::$con;
    }
}

?>
