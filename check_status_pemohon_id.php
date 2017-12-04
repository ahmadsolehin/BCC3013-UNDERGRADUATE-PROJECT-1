<?php
$hostname = "localhost"; // Your host name 
$database = "ict";       // Your database name
$username = "root";            // Your login userid 
$password = "";            // Your password 

mysql_connect($hostname, $username, $password) or die('Could not connect');
mysql_select_db($database);

$id = $_POST['id'];

$q = "SELECT * FROM tpemohonan WHERE mohon_id = '".$id."' ";

$query = mysql_query($q);
$results = array();

while($row = mysql_fetch_array($query))
{
	$results[] = array(
		'mohon_nama' => $row['mohon_nama'],
		'status_id' => $row['status_id']
		);
}

$json = json_encode($results);

echo $json;
?>