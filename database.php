<?php
$server_db = "localhost";
$user_db= "root";
$password_db="";
$name_db ="fakebook";
$conn ="";
try{
    $conn = mysqli_connect($server_db,$user_db,$password_db,$name_db);
}
catch(mysqli_sql_exception)
{
    echo "Connection failed!<br>";
}
?>