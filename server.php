<?php
include 'connection.php';
session_start();

if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $depId = $_POST['department_id'];

        

    $sql = "SELECT * FROM employees WHERE email = '$email'";
    
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        require 'register.php';
        echo 'Email is already is use!';
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO employees VALUES(NULL, \''.$name.'\', \''.$surname.'\', \''.$password.'\', \''.$email.'\', \''.$depId.'\');';

        if (mysqli_query($connect, $sql)) {
            echo 'Registration worked!';
            header('Location: login.php');
        }
    }
} elseif (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM employees WHERE email = '$email'";
    $result = mysqli_query($connect, $sql);
    if ($result === false) {
        echo 'Error: ' . mysqli_error($connect);
        exit();
    }
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            echo 'Registration worked!';
            $_SESSION['employee_id'] = $row['id']; 
            
            
            // Check if the user is an admin
            $admin_emails = ['adela.sykora@seznam.cz', 'tomas.novak@seznam.cz', 'petra.kratochvilova@seznam.cz', 'jan.stepanek@seznam.cz'];
            if (in_array($email, $admin_emails)) {
                header('Location: depAdmin.php');
            } else {
                // Redirect to a regular user page
                header('Location: employee.php');
            }

        } else {
            require 'login.php';
            echo 'Wrong Password!';
        }
    } else {
        require 'login.php';
        echo 'Wrong Email!';
    }
}

?>

