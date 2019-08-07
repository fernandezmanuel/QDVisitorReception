<!DOCTYPE html>
<html>
<head>
<title>QDVisitorReception</title>
<style>
body
{
	font-family:'Georgia',serif;
	background:#fafafa;
}
</style>
</head>
<body>
<?php
include('../configuratie.php');

if ($resultaat = $databank->query("SELECT * FROM bezoeker ORDER BY tijd DESC"))
{
	if ($resultaat->num_rows > 0)
	{
		echo "<table border=\"1\" cellpadding=\"10\">";
		echo "<tr><th>Name</th><th>E-mail</th><th>Organisation</th><th>Time</th><th></th></tr>";

		while ($rij = $resultaat->fetch_object())
		{
			echo "<tr>";
			echo "<td>" . $rij->naam . "</td>";
			echo "<td>" . $rij->meel . "</td>";
			echo "<td>" . $rij->bedrijf . "</td>";
			echo "<td>" . $rij->tijd . "</td>";
			echo "<td><abbr title=\"Delete entry\" style=\"text-decoration:none\"><a href=\"verwijder.php?naam=" . $rij->naam . "\" style=\"text-decoration:none\">❌</a></td></abbr>";
			echo "</tr>";
		}
		
		echo "</table>";
	}

	else
	{
		echo "<span style=\"font-size:128px\">🗇</span><br /><br />The visitor list is empty...";
	}
}

else
{
	echo "<span style=\"font-size:128px\">🙀</span><br /><br />" . $databank->error;
}

$databank->close();
?>

<br /><br />
<a href="../index.php" style="text-decoration:none;"><button style="font-size:24px;cursor:pointer;">⬅️ Back</button></a>

</body>
</html>