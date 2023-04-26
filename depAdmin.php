<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    body {
        color: #000;
        overflow-x: hidden;
        height: 100%;
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }

    .card {
        padding: 30px 40px;
        margin-top: 60px;
        margin-bottom: 60px;
        border: none !important;
        box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2);
    }

    .delete-btn {
        float: right;
    }
    </style>
</head>

<body>



    <?php
        
    include 'connection.php';

    echo "<button onclick='window.location.href=\"add_emp.php\";'>Add employee</button>";
    echo "<button onclick='window.location.href=\"add_dep.php\";'>Add department</button>";
    


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
            echo "<div style='background-color: $department_color; padding: 10px;' class='card'>";
            echo "<h3>$department_name</h3>";
            echo "<p>Shortcut: $department_shortcut</p>";
            echo "<p>City: $department_city</p>";

            // Get employees for this department
            //mysqli_query($connect ,"SET NAMES utf8mb4_general_ci");
            
            
            $sql2 = "SELECT * FROM employees WHERE department_id = $department_id";
            
            $result2 = mysqli_query($connect, $sql2);

            // Check if there are any employees in this department
            if (mysqli_num_rows($result2) > 0) {
                // Output each employee in a separate paragraph
                echo "<button onclick='toggleEmployees(this, $department_id)'>Show/Hide Employees</button>";
                echo "<div id='employees-$department_id' style='display: none;'>";
                echo "<p>Employees:</p>";
                while($row2 = mysqli_fetch_assoc($result2)) {
                    
                    $employee_name = $row2["name"];
                    $employee_surname = $row2["surname"];
                    $employee_id = $row2["id"];
                    echo "<p>$employee_name $employee_surname</p>";
                    echo "<button onclick='window.location.href=\"edit_emp.php?emp_id=$employee_id\";'>Edit $employee_surname</button>";
                }
                echo "</div>";
            } else {
                echo "<p>No employees in this department.</p>";
            }
            
            echo "<button onclick='window.location.href=\"edit_dep.php?dep_id=$department_id\";'>Edit Deparment</button>";
            
            echo "<button class='delete-btn' onclick='window.location.href=\"delete_dep.php?dep_id=$department_id\";'>Delete</button>";

            echo "</div>";
        }
    } else {
        echo "No departments found.";
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
