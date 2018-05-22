<?php
session_start();
if(isset($_SESSION['user_id']))
{
    header('Location: http://localhost/rest_todo/php_scripts/todo.php');

}
else{
    header('Location: http://localhost/rest_todo/php_scripts/login_view.php');
}
?>