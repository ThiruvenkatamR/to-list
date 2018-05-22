<?php
session_start();
if(isset($_SESSION['user_id']))
{
    header('Location: php_scripts/todo.php');

}
else{
    header('Location: php_scripts/login_view.php');
}
?>