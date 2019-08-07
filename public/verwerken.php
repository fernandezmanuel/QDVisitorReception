<?php
require_once("../configuratie.php");

if((isset($_POST['naam'])) && (isset($_POST['meel'])) && (isset($_POST['bedrijf'])))
{
	$naam = $databank->real_escape_string($_POST['naam']);
	$meel = $databank->real_escape_string($_POST['meel']);
	$bedrijf = $databank->real_escape_string($_POST['bedrijf']);
	
	$invoegen = "INSERT INTO bezoeker (naam, meel, bedrijf) VALUES ('".$naam."','".$meel."','".$bedrijf."')";
	
	if ($databank->query($invoegen) === TRUE)
	{
		echo "<meta http-equiv=\"refresh\" content=\"60; URL=./index.html\" /><style>body { background:#9bdb4d; }</style><span style=\"font-size:128px\">😺</span>\n<br /><br /><span style=\"font=family:'Georgia',serif;font-size:48px;\">Your name has been written in the visitor list, $naam!</span><br /><br /><a href=\"./index.html\" style=\"text-decoration:none;\"><button style=\"font-size:24px;cursor:pointer;\">⬅️ Back</button></a>";
	}
	else
	{
		echo "<style>body { background:#ed5353; }</style><span style=\"font-size:128px\">😿</span>\n<br /><br /><span style=\"font=family:'Georgia',serif;font-size:48px;\">Your entry wasn't added,<br />you're probaby already on the visitor list.</span><br /><br /><span style=\"font-family:'Monaco','Consolas',monospace;font-size:8px;\">" . $invoegen . "<br /><br />" . $databank->error . "</span><br /><br /><a href=\"./index.html\" style=\"text-decoration:none;\"><button style=\"font-size:24px;cursor:pointer;\">⬅️ Back</button></a>";
	}
	
	$databank->close();
}
else
{
	echo "<style>body { background:#ed5353; }</style><span style=\"font-size:128px\">🙀</span>\n<br /><br /><span style=\"font=family:'Georgia',serif;font-size:48px;\">Connection to the database failed or something, get the sysadmin.</span><br /><br /><span style=\"font-family:'Monaco','Consolas',monospace;font-size:8px;\">" . $invoegen . "<br /><br />" . $databank->error . "</span><br /><br /><a href=\"./index.html\" style=\"text-decoration:none;\"><button style=\"font-size:24px;cursor:pointer;\">⬅️ Back</button></a>";
}
?>