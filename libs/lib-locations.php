<?php

function insertLocation($data){
    global $pdo;
    //validation here

    $sql="INSERT INTO `locations` (`title`, `lat`, `lng`, `type`) VALUES (:title, :lat, :lng,:typ);";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([':title'=>$data['title'],':lat'=>$data['lat'],':lng'=>$data['lng'],':typ'=>$data['type']]);
    
    return $stmt->rowCount();
}

function getLocations($params = []){
    global $pdo;

    $condition="";
    if(isset($params['verified']) and in_array($params['verified'],['0','1']) ){
        $condition ="WHERE verified={$params['verified']}";
    }

    $sql="SELECT * FROM `locations` $condition";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}