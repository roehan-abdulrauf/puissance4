<?php

class Security {

    public static function safeHTML($chain){
        $results  = strip_tags($chain);
        $results = htmlentities($results);
        $results = htmlspecialchars($results);
        return $results;
    }

    public static function isConnect(){
        return (!empty($_SESSION['user']));
    }
}

?>