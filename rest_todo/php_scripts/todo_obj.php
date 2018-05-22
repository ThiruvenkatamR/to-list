<?php 
include("query.php");
class todo_obj{
    private $id;
    private $user_id;
    private $title;
    private $description;
    private $checked;

    function read($user_id)
    {
        global $conn;
        $sql = select_1_task($user_id);
        $sql->execute();
        $result = $sql->get_result();
        $result = $result->fetch_all();
        return json_encode($result);

    }
    function insert($user_id, $title, $description)
    {
        global $conn;
        $sql = insert_tasks($title, $description, $user_id);
        $sql->execute();       
    }
    function delete($id)
    {
        global $conn;
        $sql = delete($id);
        $sql->execute();
    }
    function update($user_id, $id)
    {
        global $conn;
        $sql = select_2_task($id, $user_id);
        $r = $sql->execute();
        $result = $sql->get_result();
        // $result = $sql->get_result();
        while($row=$result->fetch_assoc())
        {
            $done = $row['checked'];
        }
        // return $done;
        if($done == 0)
        {
            $check = 1;
            $sql = update($check, $id);
        }
        else
        {
            $check = 0;
            $sql = update($check, $id);
        }
        $sql->execute();
    }
}
?>