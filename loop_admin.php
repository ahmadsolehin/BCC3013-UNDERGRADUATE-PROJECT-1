<?php 


$hostname = "localhost"; // Your host name 
$database = "ict";       // Your database name
$username = "root";            // Your login userid 
$password = "";            // Your password 


$link = mysql_connect($hostname,$username,$password) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database,$link);




$mohon_id = $_POST['id'];

for ($i=1; $i<=9; $i++) { 

        $query = mysql_query("SELECT peralatan_jumperaku FROM tperalatan WHERE mohon_id='$mohon_id' AND alatan_id='$i'") or die(mysql_error());
        $result = mysql_fetch_array($query);
        $data = $result['peralatan_jumperaku'];

	$quack = mysql_query("UPDATE tperalatan SET peralatan_jumlulus='$data' WHERE mohon_id='$mohon_id' AND alatan_id='$i'") or die (mysql_error());

}

?>
