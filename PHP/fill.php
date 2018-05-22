<?php
session_start();
include("dbconfig.php");
if($_POST['submit'])
{
    $reg_no = $_POST['register_no'];
    $tenth_marks = $_POST['tenth_per_cent'];
    $twelfth_marks= $_POST['twelfth_per_cent'];
    $ug_cgpa = $_POST['ug_cgpa'];
    $college = $_POST['college_name'];
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO `details`(`id`, `user_id`, `reg_no`, `tenth_score`, `twelfth_score`, `ug_cgpa`, `college_name`) VALUES (NULL,'$user_id','$reg_no','$tenth_marks','$twelfth_marks','$ug_cgpa','$college')";
    if($conn->query($sql)==true)
    {
        header('Location: http://localhost/PHP/details_view.php');
    }
}
?>