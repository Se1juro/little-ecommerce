<?php

class db
{
    private static $host = 'localhost';
    private static $user = 'root';
    private static $password = '';
    private static $db = 'tienda_php';

    public static function connect()
    {
        $db = new mysqli(self::$host, self::$user, self::$password, self::$db);
        $db->query("SET NAMES 'utf9'");
        return $db;
    }
}