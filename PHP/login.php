<?php
session_start();
include("dbconfig.php");
if($_POST['login'])
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT user_id FROM users WHERE username = '$username' and password = '$password'";
    // echo $sql;
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()) {
            $_SESSION['user_id'] = $row["user_id"];
        }
        echo $_SESSION['user_id'];
        header('Location: http://localhost/PHP/details.html');
    }
    else{
        echo "<script>";
        echo "alert('enter proper credentials')";
        echo "</script>";
        header('Location: http://localhost/PHP/login.html');
        
    }
    

}
?>