<?php
session_start();
include("dbconfig.php");
$user_id = $_SESSION['user_id'];
$title = "";
$description = "";
if(isset($_POST['add']) )
{
 $title = $_POST['title'];
 $description = $_POST['description'];
 if($title != "" || $description != ""){
 $sql = "INSERT INTO `tasks`(`id`, `user_id`, `title`, `description`, `checked`) VALUES (NULL,'$user_id','$title','$description','0')";
 $conn->query($sql);
 header('Location: http://localhost/todo/todo.php');
 }
 }
if(isset($_POST["check"]))
{
    $id = $_POST["check"];  
    $done = "";
    $sql_2 = "select checked from tasks where id ='$id' and user_id ='$user_id'";
    $result = $conn->query($sql_2);
    while($row = $result->fetch_assoc()){
        $done = $row['checked'];
    }
    if($done == 0)
    {
    $sql = "UPDATE `tasks` SET `checked`='1' WHERE user_id ='$user_id' and id ='$id'";
    }
    else
    {
        $sql = "UPDATE `tasks` SET `checked`='0' WHERE user_id ='$user_id' and id ='$id'";
    }
    $conn->query($sql);
    header('Location: http://localhost/todo/todo.php');

}
if(isset($_POST["remove"]))
{
    $id = $_POST["remove"];  
    $sql_2 = "select checked from tasks where id ='$id'";
    $result = $conn->query($sql_2);
    $sql = "DELETE FROM `tasks` WHERE user_id ='$user_id' and id ='$id'";
    $conn->query($sql);
    header('Location: http://localhost/todo/todo.php');

}

$sql = "Select * from tasks where user_id ='$user_id'";
$result = $conn->query($sql)?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>To Do List</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="todo.css"></link>

    </head>

    <body>

        <div class="in">
            <h1>To Do List</h1>
            <form action="#" method="post">
                <input type="text" name="title" id="title" placeholder="Title">
                <input type="text" name="description" id="description" row="20" placeholder="Description">
                <button name="add" class="add" value="add">Add to List</button>
            </form>
        </div>

        <ol id="list">

            <?php if($result->num_rows>0){
           while($row = $result->fetch_assoc()) {?>
            <li>
                <form method="post">
                    <button name="check" class="check" value="<?php echo $row["id"];?>">&#10004;</button>
                </form>
                <?php if($row["checked"] == 0){?>
                <span class="dropdown">
                    <?php }else{ ?>
                    <span class="dropdown line">
                        <?php }echo $row["title"];?>
                        <span class="dropdown-content">
                            <?php echo $row["description"];?>
                        </span>
                    </span>
                    <form method="post">
                        <button name="remove" class="remove" value="<?php echo $row["id"];?>"> &#10006;</button>
                    </form>
            </li>
            <?php }}?>

        </ol>



    </body>

    </html>