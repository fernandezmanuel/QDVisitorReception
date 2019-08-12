<?php
include('../configuration.php');

if (isset($_GET['visitorname']))
{
	$visitorname = mysqli_real_escape_string($dbconnection, $_GET['visitorname']);

	if ($querysearch = $dbconnection->prepare("DELETE FROM visitor WHERE visitorname = '$visitorname'"))
	{
		$querysearch->execute();
		$querysearch->close();
		echo "<meta http-equiv=\"refresh\" content=\"60; URL=./index.html\" /><style>body { background:#9bdb4d; }</style><span style=\"font-size:128px\">😸</span>\n<br /><br /><span style=\"font=family:'Georgia',serif;font-size:48px;\">You've been removed from the visitor list, $visitorname! Thanks for stopping by.</span><br /><br /><a href=\"./index.html\" style=\"text-decoration:none;\"><button style=\"font-size:24px;cursor:pointer;\">⬅️ Back</button></a>";
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