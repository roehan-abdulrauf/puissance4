<?php

require_once(__DIR__ . '/../controller/User.php');

session_start();

if(isset($_SESSION['user'])){
    User::disconnect();
}
else{
    header('Location: ../index.php');
    exit();
}

?>