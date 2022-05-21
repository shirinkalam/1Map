<?php

include "../bootstrap/init.php";

if(!isAjaxRequest()){
    diePage("invalid request!");
}

//request is ajax and ok

if(insertLocation($_POST)){
    echo "مکان با موفقیت در پایگاه داده ذخیره شد و منتظر تایید مدیر است...";
}else{
    echo "مشکلی در ثبت مکان پیش آمده است";
}