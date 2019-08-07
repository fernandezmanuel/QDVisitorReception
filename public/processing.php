<?php
require_once("../configuration.php");

if((isset($_POST['visitorname'])) && (isset($_POST['visitormail'])) && (isset($_POST['visitororg'])))
{
	$visitorname = $dbconnection->real_escape_string($_POST['visitorname']);
	$visitormail = $dbconnection->real_escape_string($_POST['visitormail']);
	$visitororg = $dbconnection->real_escape_string($_POST['visitororg']);
	
	$insert = "INSERT INTO visitor (visitorname, visitormail, visitororg) VALUES ('".$visitorname."','".$visitormail."','".$visitororg."')";
	
	if ($dbconnection->query($insert) === TRUE)
	{
		echo "<meta http-equiv=\"refresh\" content=\"60; URL=./index.html\" /><style>body { background:#9bdb4d; }</style><span style=\"font-size:128px\">😺</span>\n<br /><br /><span style=\"font=family:'Georgia',serif;font-size:48px;\">Your name has been written in the visitor list, $visitorname!</span><br /><br /><a href=\"./index.html\" style=\"text-decoration:none;\"><button style=\"font-size:24px;cursor:pointer;\">⬅️ Back</button></a>";
	}
	else
	{
		echo "<style>body { background:#ed5353; }</style><span style=\"font-size:128px\">😿</span>\n<br /><br /><span style=\"font=family:'Georgia',serif;font-size:48px;\">Your entry wasn't added,<br />you're probaby already on the visitor list.</span><br /><br /><a href=\"./index.html\" style=\"text-decoration:none;\"><button style=\"font-size:24px;cursor:pointer;\">⬅️ Back</button></a>";
	}
	
	$dbconnection->close();
}
else
{
	echo "<style>body { background:#ed5353; }</style><span style=\"font-size:128px\">🙀</span>\n<br /><br /><span style=\"font=family:'Georgia',serif;font-size:48px;\">Connection to the database failed or something, get the sysadmin.</span><br /><br /><span style=\"font-family:'Monaco','Consolas',monospace;font-size:8px;\">" . $dbconnection->error . "</span><br /><br /><a href=\"./index.html\" style=\"text-decoration:none;\"><button style=\"font-size:24px;cursor:pointer;\">⬅️ Back</button></a>";
}
?>