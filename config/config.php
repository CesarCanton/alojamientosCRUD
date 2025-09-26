<?php

class Connection
{

    private static $instance = null;

    private $pdo;

    private function __construct()
    {
        try {

            $dsn = "mysql:host=bwwyvntcv7ft5z4gnbto-mysql.services.clever-cloud.com;dbname=bwwyvntcv7ft5z4gnbto;charset=utf8";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false

            ];

            $this->pdo = new PDO($dsn, "ulqncgsbwiwxratw", "MotkfBp5MuxtzZdERc6T", $options);
        } catch (PDOException $e) {
            echo "Error al conectarnos a la base de datos" . $e->getMessage();
        }
    }
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }



      
    public function getConnection()
    {
        return $this->pdo;
    }
}
