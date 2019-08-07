<?php
include('../configuratie.php');

if (isset($_GET['naam']))
{
	$naam = $_GET['naam'];

	if ($zoekopdracht = $databank->prepare("DELETE FROM bezoeker WHERE naam = '$naam'"))
	{
		$zoekopdracht->execute();
		$zoekopdracht->close();
	}
	else
	{
		echo "<span style=\"font-size:128px\">🙀</span><br /><br />" . $databank->error;
	}
	
	$databank->close();

	header("Location: index.php");
}
else
{
	echo "<span style=\"font-size:128px\">🙀</span><br /><br />" . $databank->error;
}
?>