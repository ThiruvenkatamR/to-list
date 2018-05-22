<?php
include("query.php");
function select_view($table_name,$user_id)
{   
    if($table_name == "tasks")
    {
    $sql = select_1_task($user_id);
    $sql->execute();
    $resultSet = $sql->get_result();
    // $result = $resultSet->fetch_assoc();
    // $res = (object) $result;
    return $resultSet;
    }
}
function insert($table_name,$title,$description){
    if($table_name == "tasks"){
        global $conn;
        $checked = 0;
        $user_id = $_SESSION['user_id'];
        $sql = insert_tasks($title,$description,$user_id);
        $sql->execute();
        header('Location: http://localhost/todo/PHP/todo_view.php');

    }
}
function check($id){
    global $conn;
    $done = 0;
    $user_id = $_SESSION['user_id'];
    $sql = select_2_task($id,$user_id);
    $r = $sql->execute();
    $result = $sql->get_result();
    while($row=$result->fetch_assoc())
    {
        $done = $row['checked'];
    }
    if($done == 0)
    {
        $check = 1;
        $sql = update($check,$id);
    }
    else
    {
        $check = 0;
        $sql = update($check,$id);
    }
    $sql->execute();
    header('Location: http://localhost/todo/PHP/todo_view.php');  
}
function remove($id){
    global $conn;
    $user_id = $_SESSION['user_id'];
    $sql = delete($id);
    $sql->execute();
    header('Location: http://localhost/todo/PHP/todo_view.php');  
}
?>