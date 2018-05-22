<?php
$host = "localhost";
$username = "root";
$password = "root1234";
$db = "students";
$conn = mysqli_connect($host, $username, $password, $db);
if($conn->connect_error)
{
    echo "error";
}
else{
    //  echo "connection success";
}
?>
