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
}elseif(isset($_post['saveEmp'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $depId = $_POST['department_id'];

    $sql = "UPDATE employees SET name = '$name', surname = '$surname', email = '$email', department_id = '$depId' WHERE id = $id";

    if (mysqli_query($connect, $sql)) {
        header('Location: depAdmin.php');
        exit;
    } else {
        echo "Error updating employee: " . mysqli_error($connect);
    }
}


?>