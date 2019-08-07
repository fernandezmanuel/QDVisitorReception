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
include('../../configuration.php');

if ($resultaat = $dbconnection->query("SELECT * FROM visitor ORDER BY visitortime DESC"))
{
	if ($resultaat->num_rows > 0)
	{
		echo "<table border=\"1\" cellpadding=\"10\">";
		echo "<tr><th>Name</th><th>E-mail</th><th>Organisation</th><th>Time</th><th></th></tr>";

		while ($rij = $resultaat->fetch_object())
		{
			echo "<tr>";
			echo "<td>" . $rij->visitorname . "</td>";
			echo "<td>" . $rij->visitormail . "</td>";
			echo "<td>" . $rij->visitororg . "</td>";
			echo "<td>" . $rij->visitortime . "</td>";
			echo "<td><abbr title=\"Delete entry\" style=\"text-decoration:none\"><a href=\"delete.php?visitorname=" . $rij->visitorname . "\" style=\"text-decoration:none\">❌</a></td></abbr>";
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
	echo "<span style=\"font-size:128px\">🙀</span><br /><br />" . $dbconnection->error;
}

$dbconnection->close();
?>

<br /><br />
<a href="../index.html" style="text-decoration:none;"><button style="font-size:24px;cursor:pointer;">⬅️ Back</button></a>

</body>
</html>