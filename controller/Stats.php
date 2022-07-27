<?php

require_once(__DIR__ . '/../model/Stats_model.php');
require_once(__DIR__ . '/Security.php');

class Stats{

    public function __construct(){
        $this->Stats_model = new Stats_model();
    }

    public function classement(){
        $results = $this->Stats_model->sql_classement();
        return $results;
    }

}
?>