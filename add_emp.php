<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add employee</title>
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://code.jquery.com/jquery-3.6.3.min.js"
      integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
    <h1 class="title">Add employee</h1>
      <div class="card">
        <form method="POST" action="update.php">
          <div class="form__group">
            <label for="fname" class="form__label">Name</label>
            <input
              type="text"
              id="fname"
              name="name"
              placeholder="Enter your name"
              class="form__input"
              onblur=""
            />
          </div>
          <div class="form__group">
            <label for="fsurname" class="form__label">Surname</label>
            <input
              type="text"
              id="fsurname"
              name="surname"
              placeholder="Enter your surname"
              class="form__input"
              onblur=""
            />
          </div>
          <div class="form__group">
            <label for="fpassword" class="form__label">Password</label>
            <input
              type="password"
              id="fpassword"
              name="password"
              placeholder="Enter your password"
              class="form__input"
              onblur=""
            />
          </div>
          <div class="form__group">
            <label for="fcheck_password" class="form__label">Check Password</label>
            <input
              type="password"
              id="fcheck_password"
              name="check_password"
              placeholder="Re-enter your password"
              class="form__input"
              onblur=""
            />
          </div>
          <div class="form__group">
            <label for="femail" class="form__label">Email</label>
            <input
              type="text"
              id="femail"
              name="email"
              placeholder="Enter your email"
              class="form__input"
              onblur=""
            />
          </div>
          <div class="form__group">
            <label for="department_id" class="form__label">Department</label>
            <select name="department_id" class="form__input">
                        <?php
                            // Database connection and query to fetch departments data
                            //$conn = mysqli_connect("localhost", "root", "", "employeesdatabasecopy_2", 3307);
                            //mysqli_set_charset($conn, "utf8");
                            $conn = mysqli_connect("localhost", "root", "", "employeesdatabasecopy_3", 3307);

                            $sql = "SELECT id, name FROM departments";
                            $result = mysqli_query($conn, $sql);

                            // Loop through departments data to create options in the select dropdown
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="formBtn">
                    <button type="submit" class="" name="addEmp">Add employee</button>
                </div>
            </form>
        </div>
    </div>



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
        if (input.val().trim() == "") {
            input.after("<span class='error'>You need to fill this!</span>");
        }
    }
    </script>
</body>

</html>