<?php

class Database{
    public static function connect_db(): PDO{
        try {
            $db = new PDO("mysql:host=localhost;dbname=puissance4;charset=utf8", "root", "");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (!$db) {
                die("Connexion a la base de donnée impossible");
            }
            return $db;
        } catch (PDOException $e) {

            echo 'echec : ' . $e->getMessage();
            var_dump($e);
        }
    }
}