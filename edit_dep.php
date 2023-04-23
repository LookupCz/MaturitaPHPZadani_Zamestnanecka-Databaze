<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Department</title>
</head>
<body>
    <h1>Edit Department</h1>
    <?php
        include 'connection.php';

        // Get the department ID from the query string
        $department_id = $_GET['dep_id'];

        // Get the department details from the database
        $sql = "SELECT * FROM departments WHERE id = $department_id";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $department_name = $row["name"];
            $department_shortcut = $row["nameShortcut"];
            $department_city = $row["city"];
            $department_color = $row["color"];
        } else {
            echo "Department not found.";
        }
    ?>

    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $department_id; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $department_name; ?>"><br>
        <label for="shortcut">Shortcut:</label>
        <input type="text" name="shortcut" value="<?php echo $department_shortcut; ?>"><br>
        <label for="city">City:</label>
        <input type="text" name="city" value="<?php echo $department_city; ?>"><br>
        <label for="color">Color:</label>
        <input type="color" name="color" value="<?php echo $department_color; ?>"><br>
        <input type="submit" value="Save" name="saveDep">
    </form>

    <br>
    <a href="depAdmin.php">Back to Departments</a>
</body>
</html>
