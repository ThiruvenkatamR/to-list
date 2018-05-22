<?php
define("update","UPDATE `tasks` SET `checked`= ? WHERE id =?");
define("delete","DELETE FROM `tasks` WHERE id = ?");
define("select_2","select checked from tasks where id= ? and user_id = ?");
define("insert","insert into tasks (user_id,title,description,checked) values (?,?,?,?)");
define("select_1","select id,title,description,checked from tasks where user_id=?");
?>