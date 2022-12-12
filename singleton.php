<?php
class Database {
    public static $instance;

    private function __construct() { }

    public static function getInstance() {
        if(!self::$instance) {
            return self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getQuery() {
        return "SELECT * FROM table";
    }
}

$db = Database::getInstance();
$db1 = Database::getInstance();
$db2 = Database::getInstance();
var_dump($db);
var_dump($db1);
var_dump($db2->getQuery());