<?php



$hostname = "localhost"; // Your host name 
$database = "ict";       // Your database name
$username = "root";            // Your login userid 
$password = "";            // Your password 

mysql_connect($hostname, $username, $password) or die('Could not connect');
mysql_select_db($database);

$caw_id = $_POST['id'];

$q = "SELECT * FROM kod_cawangan WHERE caw_id = '".$caw_id."' ";

$query = mysql_query($q);
$results = array();

while($row = mysql_fetch_array($query))
{
	$results[] = array(
		'caw_id' => $row['caw_id'],
		'caw_nama' => $row['caw_nama']
		);
}

$json = json_encode($results);

echo $json;
?>