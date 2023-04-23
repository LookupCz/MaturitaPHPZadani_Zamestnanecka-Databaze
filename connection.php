<?php

    $connect = new mysqli("localhost", "root", "", "employeesdatabase", 3307) or die();
    
    if($connect->connect_errno){
        echo "Nastala chyba neumíte pracovat s DB: ".$connect->connect_error;
    }
    else{
        echo "Připojili jste se úšpěšně k DB";
    }
?>