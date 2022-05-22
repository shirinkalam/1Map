<?php

include "../bootstrap/init.php";

if(!isAjaxRequest()){
    diePage("invalid request!");
}

if(is_null($_POST['loc']) or !is_numeric($_POST['loc'])){
   echo "invalid location!";
   die();   
}

//request is ajax and ok
echo toggleStatus($_POST['loc']);
