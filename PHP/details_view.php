<!DOCTYPE html>
<?php session_start();
include("dbconfig.php");
$user_id = $_SESSION['user_id'];
$sql = "Select * from details where user_id ='$user_id'";
$result = $conn->query($sql)?>
<html>
    <head>
        <title>View</title>
        <link rel="stylesheet" type="text/css" href="login.css"></link>
    </head>
    <body>
        <table>
            <tr><th>ID</th><th>Registration no</th><th>Tenth Score</th><th>Twelfth Score</th><th>UG Score</th><th>College name</th></tr>
           <?php if($result->num_rows>0){
           while($row = $result->fetch_assoc()) {?>
            <tr>
            <td><?php echo $row["id"];?></td>
            <td><?php echo $row["reg_no"];?></td>
            <td><?php echo $row["tenth_score"];?></td>
            <td><?php echo $row["twelfth_score"];?></td>
            <td><?php echo $row["ug_cgpa"];?></td>
            <td><?php echo $row["college_name"];?></td>
            </tr>
           <?php }}?>
           </table>
        <form method="post" action="logout.php" class="logout">
            <input type="submit" name="logout" value="Logout">
           </form>
    </body>
</html>