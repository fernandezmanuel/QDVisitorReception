<?php
include('../configuration.php');

if (isset($_GET['visitorname']))
{
	$visitorname = mysqli_real_escape_string($dbconnection, $_GET['visitorname']);

	if ($querysearch = $dbconnection->prepare("DELETE FROM visitor WHERE visitorname = '$visitorname'"))
	{
		$querysearch->execute();
		$querysearch->close();
		echo "<meta http-equiv=\"refresh\" content=\"60; URL=./index.html\" />Thanks $visitorname for visiting!<br /><br />Your entry has been removed from the list.";
	}
	else
	{
		echo "🙀 Connection to the database failed or something, get the sysadmin. Show them this:<br /><br />" . $dbconnection->error;
		$dbconnection->close();
	}
}
else
{
	header("Location: index.html");
}
?>