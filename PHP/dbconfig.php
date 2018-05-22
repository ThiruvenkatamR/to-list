<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "students";

$conn = mysqli_connect($host,$username,$password,$db);
if($conn->connect_error)
{
    echo "error";
}
else{
    // echo "connection success";
}
?>
