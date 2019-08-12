<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "qdvrdb";

$dbconnection = new mysqli($servername, $username, $password, $database);

if ($dbconnection->connect_error)
{
    die("🙀 Connection to the database failed or something, get the sysadmin. Show them this:<br /><br />" . $dbconnection->connect_error);
	//mysqli_report(MYSQLI_REPORT_ERROR);
}

?>