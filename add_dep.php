<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Department</title>

    <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
</head>
<body>
    <h1>Edit Department</h1>
    

    <form action="update.php" method="post">
        
        <label for="name">Name:</label>
        <input type="text" name="name" value="" placeholder="Name the Department" ><br>
        <label for="shortcut">Shortcut:</label>
        <input type="text" name="shortcut" value="" placeholder='Shortcut of the name'><br>
        <label for="city">City:</label>
        <input type="text" name="city" value="" placeholder='City in which the department is'><br>
        <label for="color">Color:</label>
        <input type="color" name="color" value="" placeholder='Color of that Departments'><br>
        
        <button type="submit" name="addDep">Add department</button>       

    </form>

    <br>
    <a href="depAdmin.php">Back to Departments</a>

    <script>
    
    $("form").submit(isFormValid);

    function isFormValid(event) {
        event.preventDefault(); // prevent default form submission behavior
        $(".error").remove();
        isInputFilled("name");
        isInputFilled("shortcut");
        isInputFilled("city");
        
        

        isShortcutValid('shortcut');
        


        if (!($(".error").length > 0)) {
            $("form").unbind("submit");
        } 
    }

    function isShortcutValid(shortcut) {
        let input = $("input[name=" + shortcut + "]");
        let shortcutRegex = /^[a-zA-Z]{2,4}$/;
        if (!shortcutRegex.test(input.val())) {
            input.after("<span class='error'>Shortcut isnt valid</span> <br>"); 
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
