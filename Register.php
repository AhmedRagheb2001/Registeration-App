<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Welcome to Register App</h1>
    </header>
    <form action="Register.php" method="Post">
        <label for="username">username : </label><br>
        <input type="text" id="username" name="username" maxlength="25"><br>
        <label for="password">password : </label><br>
        <input type="password" maxlength="40" id="password" name="password"><br>
        <label for="gender">Chooser your gender : </label><br>
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="prfere_not_to_say">Prefer not to say</option>
        </select><br><br>
        <input type="submit" name="register" value="Register">
    </form>
    <a href="Login.php">
        <button>Login</button><br>
    </a>
</body>

</html>
<?php
if (isset($_POST["register"])) {
    if (empty($_POST["username"])) {
        echo "Please enter the username !<br>";
    } else if (empty($_POST["password"])) {
        echo "Please enter the password !<br>";
    } else if (empty($_POST["gender"])) {
        echo "Please choose your gender!<br>";
    } else {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $gender = $_POST["gender"];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO USERS (username, password,gender)
                        VALUES('$username','$hash','$gender')";
        try {
            if (mysqli_query($conn, $sql)) {
                echo "The user is successfully registered <br>";
            } else {
                echo "Registeration failed!<br>";
            }
        } catch (mysqli_sql_exception) {
            echo "The username is taken <br>";
        }
    }
}
?>
<?php
mysqli_close($conn);
?>