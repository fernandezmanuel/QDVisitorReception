<?php

include_once '../helpers/init.php';

if((isset($_POST['visitorname'])) && (isset($_POST['visitormail'])) && (isset($_POST['visitororg'])))
{
	$visitorname = mysqli_real_escape_string($con, $_POST['visitorname']);
	$visitormail = mysqli_real_escape_string($con, $_POST['visitormail']);
	$visitororg = mysqli_real_escape_string($con, $_POST['visitororg']);

    $checkvisitorname = $_POST['visitorname'];
	$check = mysqli_query($con,"SELECT * FROM visitor WHERE visitorname = '".$checkvisitorname."'");
	
	if (($insert = $con->prepare("INSERT INTO visitor (visitorname, visitormail, visitororg) VALUES ('".$visitorname."','".$visitormail."','".$visitororg."')")) && (mysqli_num_rows($check)==0))
	{
		$insert->execute();
		$insert->close();
		echo ">⬅️ Back</button></a>";
	}
	else
	{
		echo "<style>body { background:#ed5353; }</style><span style=\"font-size:128px\">😿</span>\n<br /><br /><span style=\"font=family:'Georgia',serif;font-size:48px;\">Your entry wasn't added,<br />you're probaby already on the visitor list.</span><br /><br /><a href=\"./index.html\" style=\"text-decoration:none;\"><button style=\"font-size:24px;cursor:pointer;\">⬅️ Back</button></a>";
	}
	
	$con->close();
}
else
{
	echo "<style>body { background:#ed5353; }</style><span style=\"font-size:128px\">🙀</span>\n<br /><br /><span style=\"font=family:'Georgia',serif;font-size:48px;\">Connection to the database failed or something, get the sysadmin.</span><br /><br /><span style=\"font-family:'Monaco','Consolas',monospace;font-size:8px;\">" . $con->error . "</span><br /><br /><a href=\"./index.html\" style=\"text-decoration:none;\"><button style=\"font-size:24px;cursor:pointer;\">⬅️ Back</button></a>";
}