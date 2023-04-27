<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Department</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
            crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1 class="title">Add Department</h1>
        <form class="form" action="update.php" method="post">
            <div class="form-group">
                <label class="label" for="name">Name:</label>
                <input class="input" type="text" name="name" value="" placeholder="Name the Department" >
            </div>
            <div class="form-group">
                <label class="label" for="shortcut">Shortcut:</label>
                <input class="input" type="text" name="shortcut" value="" placeholder='Shortcut of the name'>
            </div>
            <div class="form-group">
                <label class="label" for="city">City:</label>
                <input class="input" type="text" name="city" value="" placeholder='City in which the department is'>
            </div>
            <div class="form-group">
                <label class="label" for="color">Color:</label>
                <input class="color-picker" type="color" name="color" value="">
            </div>
            <div class="form-group">
                <button class="button" type="submit" name="addDep">Add department</button>       
            </div>
        </form>
        <div class="back-link">
            <a href="depAdmin.php">Back to Departments</a>
        </div>
    </div>

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
            input.after("<span class='error'>Shortcut isn't valid</span> <br>"); 
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