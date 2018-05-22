<?php
session_start();
if($_POST['logout'])
{
   session_destroy();    
   header('Location: http://localhost/PHP/login.html');
}
?>