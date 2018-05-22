
<?php
session_start();
if(isset($_SESSION['user_id']) && ($_SESSION['user_id'] > 0))
{
    
?> 
<html>
<head>
    <title>To Do List</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/todo.css"></link>
    <script src="../js/todo.js"></script>
</head>

<body>

    <div class="in">
        <h1>To Do List</h1>
        
        <input type="text" id="title" placeholder="Title" onkeyup="mycheck_1(this.value)">
        
        <p  id="error1">&nbsp;</p>
        <textarea id="description" row="20" placeholder="Description" onkeyup="mycheck_2(this.value)"></textarea>
        <p  id="error2">&nbsp;</p>
        <button onclick="add()" class="add">Add to List</button>
    </div>

    <ol id="list">
        <form method="post" action="../php_scripts/logout.php">
            <button type="submit" name="logout" class="logout" value="logout">Logout</button>
        </form>

    </ol>



</body>

</html>
<?php
}
else{
    header('Location: ../index.php');
}
?> 