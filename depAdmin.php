<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    body {
        color: #000;
        overflow-x: hidden;
        height: 100%;
        ;
        background-repeat: no-repeat;
        background-size: 100% 100%
    }

    .card {
        padding: 30px 40px;
        margin-top: 60px;
        margin-bottom: 60px;
        border: none !important;
        box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
    }
    </style>
</head>

<body>
    <?php
        
        include 'connection.php';

        // Get departments
        $sql = "SELECT * FROM departments";
        $result = mysqli_query($connect, $sql);

// Check if there are any departments
if (mysqli_num_rows($result) > 0) {
  // Output each department in a separate div
  while($row = mysqli_fetch_assoc($result)) {
    $department_name = $row["name"];
    $department_shortcut = $row["nameShortcut"];
    $department_city = $row["city"];
    $department_color = $row["color"];

    // Output the department div

    echo "<div style='background-color: $department_color; padding: 10px; class='card''>";
    echo "<h3>$department_name</h3>";
    echo "<p>Shortcut: $department_shortcut</p>";
    echo "<p>City: $department_city</p>";

    // Get employees for this department
    $department_id = $row["id"];
    $sql2 = "SELECT * FROM employees WHERE department_id = $department_id";
    $result2 = mysqli_query($connect, $sql2);

    // Check if there are any employees in this department
    if (mysqli_num_rows($result2) > 0) {
      // Output each employee in a separate paragraph
      echo "<p>Employees:</p>";
      while($row2 = mysqli_fetch_assoc($result2)) {
        $employee_name = $row2["name"];
        $employee_surname = $row2["surname"];
        echo "<p>$employee_name $employee_surname</p>";
      }
    } else {
      echo "<p>No employees in this department.</p>";
    }

    echo "</div>";
  }
} else {
  echo "No departments found.";
}
?>





</body>

</html>