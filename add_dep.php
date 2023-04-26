<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Department</title>
</head>
<body>
    <h1>Edit Department</h1>
    

    <form action="update.php" method="post">
        <input type="hidden" name="id" value="" >
        <label for="name">Name:</label>
        <input type="text" name="name" value="" placeholder="Name the Department" ><br>
        <label for="shortcut">Shortcut:</label>
        <input type="text" name="shortcut" value="" placeholder='Shortcut of the name'><br>
        <label for="city">City:</label>
        <input type="text" name="city" value="" placeholder='City in which the department is'><br>
        <label for="color">Color:</label>
        <input type="color" name="color" value="" placeholder='Color of that Departments'><br>
        <input type="submit" value="Save" name="addDep">
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
        isInputFilled("color");
        

        makeShortcut('shortcut');
        isNameValid('name');


        if (!($(".error").length > 0)) {
            $("form").unbind("submit");
        } 
    }

    function isEmailValid(email) {
        let input = $("input[name=" + email + "]");
        let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!emailRegex.test(input.val())) {
            input.after("<span class='error'>Email isnt valid</span> <br>");
        }
    }

    function makeShortcut() {
        let input = $("input[name=" + shortcut + "]");
        let shortcutRegex = /^[a-zA-Z]{2,4}$/;
        if (!shortcutRegex.test(input.val())) {
            input.after("<span class='error'>Shortcut isnt valid</span> <br>"); 
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
