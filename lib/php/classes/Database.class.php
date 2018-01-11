<?php

class Database {

    private static $_instance = null;

    public static function getInstance($dsn, $user, $pass) {

        if (!self::$_instance) {
            try {
                self::$_instance = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Echec de connexion " . $e->getMessage();
            }
        }
        return self::$_instance;
    }

}
