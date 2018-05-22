<?php
session_start();
if(isset($_SESSION['user_id']) && ($_SESSION['user_id'] > 0))
{
    $user_id = $_SESSION['user_id'];
    include("todo_obj.php");
    $task = new todo_obj();
    $method = $_SERVER['REQUEST_METHOD'];

    switch($method){
        case "POST":
            $title = $_REQUEST['title'];
            $description = $_REQUEST['description'];
            $task->insert($user_id, $title, $description);
            $result = $task->read($user_id);
            return $title;
            break;
        case "GET":
            $result = $task->read($user_id);
            echo $result;  
            break;
        case "DELETE":
            $id = $_REQUEST['id'];
            $task->delete($id);
            $result = $task->read($user_id);
            echo $result; 
            break;
        case "PUT":
            $id = $_REQUEST['id'];
            $res = $task->update($user_id, $id);
            $result = $task->read($user_id);
            echo $result;  
            break;
    }
//    echo $method;
}
else{
    header('Location: http://localhost/rest_todo/html/login.html');
}
?>