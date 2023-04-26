<?php
include 'connection.php';
session_start();

if(isset($_POST['saveDep'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $shortcut = $_POST['shortcut'];
    $city = $_POST['city'];
    $color = $_POST['color'];

    $sql = "UPDATE departments SET name = '$name', nameShortcut = '$shortcut', city = '$city', color = '$color' WHERE id = $id";

    if (mysqli_query($connect, $sql)) {
        header('Location: depAdmin.php');
        exit;
    } else {
        echo "Error updating department: " . mysqli_error($connect);
    }

//THIS AFTER I MAKE UPDATE TO EMPLOYEES
}elseif(isset($_POST['saveEmp'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $depId = $_POST['depId'];

    $sql = "UPDATE employees SET name = '$name', surname = '$surname', email = '$email', department_id = '$depId' WHERE id = $id";

    if (mysqli_query($connect, $sql)) {
        header('Location: depAdmin.php');
        exit;
    } else {
        echo "Error updating employee: " . mysqli_error($connect);
    }
}elseif(isset($_POST['addEmp'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $depId = $_POST['depId'];

    

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
}elseif(isset($_POST['addDep'])) {
    $name = $_POST['name'];
    $shortcut = $_POST['shortcut'];
    $city = $_POST['city'];
    $color = $_POST['color'];

    

    $sql = "INSERT INTO departments VALUES(NULL, '$name', '$shortcut', '$city', '$color')";

    if (mysqli_query($connect, $sql)) {
        header('Location: depAdmin.php');
        exit;
    } else {
        echo "Error adding department: " . mysqli_error($connect);
    }
}


?>