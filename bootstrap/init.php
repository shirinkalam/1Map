<?php
session_start();
include "constans.php";
include BASE_PATH . "bootstrap/config.php";
include BASE_PATH . "vendor/autoload.php";
include BASE_PATH . "libs/helpers.php";



try{
    $pdo=new PDO("mysql:dbname=$database_config->db;host={$database_config->host}"  ,  $database_config->user   ,  $database_config->pass);
    $pdo->exec("set names utf8;");
}catch(PDOException $e){
    diePage('connection faild: '. $e->getMessage());
}

include BASE_PATH . "libs/lib-users.php";
include BASE_PATH . "libs/lib-locations.php";
