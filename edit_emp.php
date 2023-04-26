<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <?php
        include 'connection.php';

        // Get the department ID from the query string
        $employee_id = $_GET['emp_id'];

        // Get the department details from the database
        $sql = "SELECT * FROM employees WHERE id = $employee_id";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $employee_name = $row["name"];
            $employee_surname = $row["surname"];
            $employee_email = $row["email"];
            $employee_depId = $row["department_id"];
        } else {
            echo "Employee not found.";
        }
    ?>

    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $employee_id; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $employee_name; ?>"><br>
        <label for="surname">Surname:</label>
        <input type="text" name="surname" value="<?php echo $employee_surname; ?>"><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $employee_email; ?>"><br>
        <label for="depId">Department:</label>
        <select name="depId">
            <?php
                $sql = "SELECT * FROM departments";
                $result = mysqli_query($connect, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $dep_id = $row["id"];
                        $dep_name = $row["name"];
                        $dep_shortcut = $row["nameShortcut"];
                        $dep_city = $row["city"];
                        $dep_color = $row["color"];

                        if ($dep_id == $employee_depId) {
                            echo "<option value='$dep_id' selected>$dep_name ($dep_shortcut)</option>";
                        } else {
                            echo "<option value='$dep_id'>$dep_name ($dep_shortcut)</option>";
                        }
                    }
                }
            ?>
        </select><br>
        <input type="submit" value="Save" name="saveEmp">

    <br>
    <a href="depAdmin.php">Back to Departments</a>
</body>
</html>
