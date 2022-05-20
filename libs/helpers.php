<?php defined('BASE_PATH') or die('Permision Defined');

function isAjaxRequest(){
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest' ){
        return true;
    }
    return false;
}


function diePage($msg){
    echo "<div style='
    padding:30px;
    margin:50px auto;
    width:80%;
    background:#f9dede;
    border:1px solid #cca4a4;
    color:#521717;
    border-radius:5px;
    font-family:sans-serif;
    '>$msg</div>";
    die();
}

function message($msg,$cssclass='info'){
    echo "<div class='$cssclass' style='
    padding:20px;
    margin:10px auto;
    width:80%;
    background:#f9dede;
    border:1px solid #cca4a4;
    color:#521717;
    border-radius:5px;
    font-family:sans-serif;
    '>$msg</div>";
}

function dd($var){
    echo "<pre style='color: #9c4100; background: #fff; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid #9c4100; }'>";
    var_dump($var);
    echo "</pre>";
}

function site_url($uri = ''){
    return BASE_URL . $uri;
}

function redirect($url){
    header("location: $url");
    die();
}





