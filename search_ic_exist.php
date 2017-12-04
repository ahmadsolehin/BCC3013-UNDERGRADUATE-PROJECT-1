<?php
$hostname = "localhost"; // Your host name 
$database = "ict";       // Your database name
$username = "root";            // Your login userid 
$password = "";            // Your password 

mysql_connect($hostname, $username, $password) or die('Could not connect');
mysql_select_db($database);

$ic = $_POST['ic'];

$query = "SELECT * from tpemohonan where mohon_kp = '$ic'";
$result = mysql_query($query);

if(mysql_num_rows($result) > 0)
{
    echo "Sudah";
}

?>
