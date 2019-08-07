<?php
include('../../configuration.php');

if (isset($_GET['visitorname']))
{
	$visitorname = $_GET['visitorname'];

	if ($zoekopdracht = $dbconnection->prepare("DELETE FROM visitor WHERE visitorname = '$visitorname'"))
	{
		$zoekopdracht->execute();
		$zoekopdracht->close();
	}
	else
	{
		echo "🙀 Connection to the database failed or something, get the sysadmin. Show them this:<br /><br />" . $dbconnection->error;
	}
	
	$dbconnection->close();

	header("Location: index.php");
}
else
{
	echo "🙀 Connection to the database failed or something, get the sysadmin. Show them this:<br /><br />" . $dbconnection->error;
}
?>