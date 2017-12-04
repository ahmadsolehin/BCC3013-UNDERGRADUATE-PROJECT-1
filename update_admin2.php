<?php 


$hostname = "localhost"; // Your host name 
$database = "ict";       // Your database name
$username = "root";            // Your login userid 
$password = "";            // Your password 


$link = mysql_connect($hostname,$username,$password) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database,$link);

$id = $_POST['id'];
$perilaku = "3";

mysql_query("UPDATE tpemohonan SET status_id = '".$perilaku."' WHERE mohon_id = '".$id."'");



?>
