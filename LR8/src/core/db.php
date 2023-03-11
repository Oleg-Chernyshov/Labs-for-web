<?php

class dbPdo
{
    private static $pdo = null;
    private static $instance = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        return static::$instance ?? (static::$instance = new static());

    }

    private static function initConnection()
    {
        $db = static::getInstance();
        $db->conn = new PDO("mysql:host=127.0.0.1;dbname=repair orders", "root", "");

        return $db;
    }

    public static function getPdo()
    {

        $db = static::initConnection();

        return $db->conn;

    }
}