<?php


    $connect = new mysqli("localhost", "root", "", "employeesdatabasecopy_4", 3307) or die();
    //$connect->set_charset("utf8mb4_unicode_ci");
    //$sql = "ALTER TABLE departments MODIFY ascii_text_column TEXT CHARACTER SET utf8;";
    
    //$connect->set_charset("utf8");

    
    
    if($connect->connect_errno){
        //echo "Nastala chyba neumíte pracovat s DB: ".$connect->connect_error;
    }
    else{
        //echo "Připojili jste se úšpěšně k DB";
    }
?>