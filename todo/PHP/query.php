<?php   
include("config/dbconfig.php");
include("query_constants.php");
function select_1_task($user_id)
{
    global $conn;
    $query = constant('select_1'); 
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$user_id);
    return $stmt;
}
function insert_tasks($title,$description,$user_id)
{
    global $conn;
    $checked = 0;
    $query = constant('insert');
    $stmt = $conn->prepare($query);
    $stmt->bind_param("issi",$user_id,$title,$description,$checked);
    return $stmt;
}
function select_2_task($id,$user_id)
{
    global $conn;
    $query = constant('select_2');
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii",$id,$user_id);
    return $stmt;
}
function update($check,$id)
{
    global $conn;
    $query =  constant('update');
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii",$check,$id);
    return $stmt;
}
function delete($id)
{
    global $conn;
    $query = constant('delete');
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$id);
    return $stmt;  
}
?>