<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
        include 'connection.php';

        echo "<div class='add-buttons'>";
        echo "<button class='btn' onclick='window.location.href=\"add_emp.php\";'>Add Employee</button>";
        echo "<button class='btn' onclick='window.location.href=\"add_dep.php\";'>Add Department</button>";
        echo "</div>";

        $sql = "SELECT * FROM departments";    
        $result = mysqli_query($connect, $sql);

        // Check if there are any departments
        if (mysqli_num_rows($result) > 0) {
            // Output each department in a separate div
            while($row = mysqli_fetch_assoc($result)) {
                $department_id = $row["id"];
                $department_name = $row["name"];
                $department_shortcut = $row["nameShortcut"];
                $department_city = $row["city"];
                $department_color = $row["color"];

                // Output the department div
                echo "<div style='background-color: $department_color;' class='card'>";
                echo "<h3 class='card-title'>$department_name</h3>";
                echo "<p>Shortcut: $department_shortcut</p>";
                echo "<p>City: $department_city</p>";

                // Get employees for this department
                $sql2 = "SELECT * FROM employees WHERE department_id = $department_id";    
                $result2 = mysqli_query($connect, $sql2);

                // Check if there are any employees in this department
                if (mysqli_num_rows($result2) > 0) {
                    // Output each employee in a separate paragraph
                    echo "<button class='btn' onclick='toggleEmployees(this, $department_id)'>Show/Hide Employees</button>";
                    echo "<div id='employees-$department_id' class='employee-list'>";
                    echo "<H4 class='employee-title'>Employees:</H4>";
                    while($row2 = mysqli_fetch_assoc($result2)) {
                        $employee_name = $row2["name"];
                        $employee_surname = $row2["surname"];
                        $employee_id = $row2["id"];
                        echo "<p class='employee-name'>$employee_name $employee_surname</p>";
                        echo "<button class='btn' onclick='window.location.href=\"edit_emp.php?emp_id=$employee_id\";'>Edit $employee_surname</button>";
                    }
                    echo "</div>";
                } else {
                    echo "<p>No employees in this department.</p>";
                }

                echo "<button class='btn' onclick='window.location.href=\"edit_dep.php?dep_id=$department_id\";'>Edit Department</button>";
                echo "<button class='btn delete-btn' onclick='window.location.href=\"delete_dep.php?dep_id=$department_id\";'>Delete</button>";

                echo "</div>";
            }
        } else {
            echo "<p>No departments found.</p>";
        }
    ?>

    <script>
        function toggleEmployees(button, department_id) {
            var employeesDiv = document.getElementById('employees-' + department_id);
            if (employeesDiv.style.display === 'none') {
                employeesDiv.style.display = 'block';
                button.innerHTML = 'Hide Employees';
            } else {
                employeesDiv.style.display = 'none';
                button.innerHTML = 'Show Employees';
            }
        }
    </script>
</body>

</html>
