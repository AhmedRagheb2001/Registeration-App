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
        <label>Chooser your gender : </label><br>
        <input type="radio" name="gender" value ="male">
        <label>Male</label><br>
        <input type="radio" name="gender" value="female">
        <label>Female</label><br><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>
<?php
if(isset($_POST["register"]))
{
    if(empty($_POST["username"]))
    {
        echo "Please enter the username !<br>";
    }
    else if(empty($_POST["password"]))
    {
        echo "Please enter the password !<br>";
    }
    else if(empty($_POST["gender"]))
    {
        echo "Please choose your gender!<br>";
    }
    else {
        $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
        $gender = $_POST["gender"];
        $sql= "INSERT INTO USERS (username, password,gender)
                        VALUES('$username','$password','$gender')";
        try{
            if(mysqli_query($conn,$sql))
        {
            echo "The user is successfully registered <br>";
        }
        else{
            echo "Registeration failed!<br>";
        }
        }
        catch(mysqli_sql_exception)
        {
            echo "The username is taken <br>";
        }
    }
}
?>
<?php
mysqli_close($conn);
?>