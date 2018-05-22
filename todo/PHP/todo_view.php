<?php
    session_start();
    include("controller.php");
    $user_id = $_SESSION['user_id'];
    $result = select_view("tasks", $user_id);

    if(isset($_POST['add']) )
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        if($title != "" || $description != "")
        {
            insert("tasks", $title, $description);
        }
    }
    if(isset($_POST["check"]))
    {
        $id = $_POST["check"];  
        check($id);
    }
    if(isset($_POST["remove"]))
    {
        $id = $_POST["remove"];  
        remove($id);
    }
    if(isset($_POST["logout"]))
    {
        // echo "okok";    
        header('Location: http://localhost/todo/PHP/logout.php');  
    }
?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>To Do List</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="/todo/CSS/todo.css"></link>

    </head>

    <body>

        <div class="in">
            <h1>To Do List</h1>
            <form action="" method="post">
                <input type="text" name="title" id="title" placeholder="Title" required>
                <input type="text" name="description" id="description" row="20" placeholder="Description" required>
                <button name="add" class="add" value="add">Add to List</button>
            </form>
            <form method="post">
                <button type="submit" name="logout" class="logout" value="logout">Logout</button>
            </form>
        </div>

            
      

        <ol id="list">
            <?php 
           while($row=mysqli_fetch_assoc($result)){?>
                <li>
                    <form method="post">
                        <button name="check" class="check" value="<?php echo $row['id'];?>">&#10004;</button>
                    </form>
                    <?php if($row["checked"] == 0){?>
                        <span class="dropdown">
                    <?php }else{ ?>
                        <span class="dropdown line">
                            <?php }echo $row["title"];?>
                                <span class="dropdown-content">
                                    <?php echo "Description:\n".$row["description"];?>
                                </span>
                        </span>
                        <form method="post">
                            <button name="remove" class="remove" value="<?php echo $row["id"];?>"> &#10006;</button>
                        </form>
                </li>
            <?php }?> 

        </ol>



    </body>

    </html>