<?php

    $connect = new mysqli("localhost", "root", "", "employeesdatabasecopy_2", 3307) or die();
    //$sql = "ALTER TABLE departments MODIFY ascii_text_column TEXT CHARACTER SET utf8;";
    
    //$connect->set_charset("utf8");

    
    
    if($connect->connect_errno){
        //echo "Nastala chyba neumíte pracovat s DB: ".$connect->connect_error;
    }
    else{
        //echo "Připojili jste se úšpěšně k DB";
    }
?>