<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Department</title>
</head>
<body>
    <h1>Delete Department</h1>
    <?php
        include 'connection.php';

        // Get the department ID from the query string
        $department_id = $_GET['dep_id'];

        // Delete the department from the database
        $sql = "DELETE FROM departments WHERE id = $department_id";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            echo "Department deleted successfully.";
            header("Location: depAdmin.php");
        } else {
            echo "Error deleting department.";
        }
    ?>

    <br>
    <a href="depAdmin.php">Back to Departments</a>
</body>
</html>