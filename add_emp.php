<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
</head>
<body>


    <h1>Add Employee</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" placeholder="NULL">
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Enter name"><br>
        <label for="surname">Surname:</label>
        <input type="text" name="surname" placeholder="Enter surname"><br>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter password"><br>
        <label for="password">Check_Password:</label>
        <input type="password" name="password" placeholder="Enter password"><br>
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Enter email"><br>
        <label for="depId">Department:</label>
        <select name="depId">
            <?php
                include "connection.php";

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
        <input type="submit" value="Save" name="addEmp">

    <br>
    <a href="depAdmin.php">Back to Departments</a>

<script>
    $("form").submit(isFormValid);

    function isFormValid(event) {
        event.preventDefault(); // prevent default form submission behavior
        $(".error").remove();
        isInputFilled("name");
        isInputFilled("surname");
        isInputFilled("password");
        isInputFilled("check_password");
        isInputFilled("email");

        isPasswordValid("password", "check_password")
        isEmailValid("email")


        if (!($(".error").length > 0)) {
            $("form").unbind("submit");
        } 
    }

    function isPasswordValid(password1, password2) {
        let input1 = $("input[name=" + password1 + "]");
        let input2 = $("input[name=" + password2 + "]");
        if (input1.val() != input2.val()) {
            input2.after("<span class='error'>Passwords do not match</span> <br>");
        }
        if (input1.val().length < 8) {
            input1.after("<span class='error'>The password must be at least 8 characters long</span> <br>");
        } else if (input1.val().length > 25) {
            input1.after("<span class='error'>Password must be a maximum of 25 characters</span> <br>");
        }
        if (!input1.val().match(/[A-Z]/)) {
            input1.after("<span class='error'>Password must contain at least one capital letter</span> <br>");
        }
        if (!input1.val().match(/[a-z]/)) {
            input1.after("<span class='error'>Password must contain at least one lower case letter</span> <br>");
        }
        if (!input1.val().match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/)) {
            input1.after("<span class='error'>The password must contain at least one special character</span> <br>");
        }
        if (!input1.val().match(/[0-9]/)) {
            input1.after("<span class='error'>The password must contain at least one number</span> <br>");
        }

    }

    function isEmailValid(email) {
        let input = $("input[name=" + email + "]");
        let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!emailRegex.test(input.val())) {
            input.after("<span class='error'>Email isnt valid</span> <br>");
        }
    }


    function isInputFilled(inputName) {
        let input = $("input[name=" + inputName + "]");
        if (input.val().trim() == "")
            input.after("<span class='error'>You need to fill this!</span>")

    }
    </script>
</body>


</html>
