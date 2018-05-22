<?php
session_start();
include("config/dbconfig_2.php");
// echo "hello";
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
        header('Location: http://localhost/rest_todo/php_scripts/todo.php');
    }
    else{
        
      
        header('Location: http://localhost/rest_todo/php_scripts/login_view.php?x=1');
        
    }
    

}
?>