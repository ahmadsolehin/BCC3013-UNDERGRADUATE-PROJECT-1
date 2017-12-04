<?php



$hostname = "localhost"; // Your host name 
$database = "ict";       // Your database name
$username = "root";            // Your login userid 
$password = "";            // Your password 

mysql_connect($hostname, $username, $password) or die('Could not connect');
mysql_select_db($database);

$id = $_POST['id'];

$q = "SELECT * FROM tpemohonan WHERE caw_id = '$id' AND status_id IN(2, 3) ";


$query = mysql_query($q);
$results = array();

while($row = mysql_fetch_array($query))
{
	$results[] = array(
		'caw_id' => $row['caw_id'],
		'status_id' => $row['status_id'],
				'mohon_nama' => $row['mohon_nama'],
		'mohon_kp' => $row['mohon_kp']

		);
}

$json = json_encode($results);

echo $json;
?>