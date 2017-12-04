<?php



$hostname = "localhost"; // Your host name 
$database = "ict";       // Your database name
$username = "root";            // Your login userid 
$password = "";            // Your password 

mysql_connect($hostname, $username, $password) or die('Could not connect');
mysql_select_db($database);

$jab_id = $_POST['id'];

$q = "SELECT * FROM kod_jabatan WHERE jab_id = '".$jab_id."' ";

$query = mysql_query($q);
$results = array();

while($row = mysql_fetch_array($query))
{
	$results[] = array(
		'jab_id' => $row['jab_id'],
		'jab_nama' => $row['jab_nama']
		);
}

$json = json_encode($results);

echo $json;
?>