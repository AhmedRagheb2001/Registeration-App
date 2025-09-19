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
        <h1>Welcome to Login page</h1>
    </header>
    <form action="Login.php" method="Post">
        <label for="username">username : </label><br>
        <input type="text" name="username" id="username"><br>
        <label for="password">password : </label><br>
        <input type="password" name="password" id="password"><br><br>
        <input type="submit" name="confirm" value="login">
    </form>
    <a href="Register.php">
        <button>Don't have an account</button><br>
    </a>
</body>

</html>

<?php
if (isset($_POST["confirm"])) {
    if (empty($_POST["username"])) {
        echo "Please enter the username<br>";
    } else if (empty($_POST["password"])) {
        echo "Please enter the password<br>";
    } else {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "SELECT * FROM USERS WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hash = $row["password"];
            if (password_verify($password, $hash)) {
                echo "You can login <br>";
            } else {
                echo "You can't login<br>";
            }
        }
    }
}
mysqli_close($conn);
?>