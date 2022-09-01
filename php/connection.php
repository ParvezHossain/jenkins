<?php
class Database
{
    private $_connection;
    private static $_instance;

    private $servername = "localhost";
    private $username = "root";
    private $password = "phossain@schertech.com";

    public static function getInstance()
    {
        if (!self::$_instance)
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct()
    {
        try
        {
            $this->_connection = new PDO("mysql:host=$this->servername;dbname=playground", $this->username, $this->password);
            $this
                ->_connection
                ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection error: " . $e->getMessage();
        }

    }
    // Empty clone magic method to prevent duplication:
    private function __clone()
    {

    }

    // get the PDO connection
    public function getConnection()
    {
        return $this->_connection;
    }

    public function __destruct()
    {
        $this->_connection = null;
    }
}

// get the database instance
$connect = Database::getInstance();
$myConnection = $connect->getConnection();

