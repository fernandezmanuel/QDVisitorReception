<!DOCTYPE html>
<html>
<head>
<title>QDVisitorReception</title>
<meta charset="UTF-8" />
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
include('../configuration.php');

if ($whoemployees = $dbconnection->query("SELECT * FROM employee ORDER BY name ASC"))
{
	if ($whoemployees->num_rows > 0)
	{
		echo "<table border=\"1\" cellpadding=\"10\">";
		echo "<tr><th>Name</th><th>Present</th></tr>";

		while ($row = $whoemployees->fetch_object())
		{
			echo "<tr>";
			echo "<td>" . $row->name . "</td>";
			if ($row->present == 0)
			{
				echo "<td style=\"text-align:center;\"><input type=\"button\" name=\"employee\" value=\"⬜️\" /></td>";
			}
			
			else if ($row->present == 1)
			{
				echo "<td style=\"text-align:center;\"><input type=\"button\" name=\"employee\" value=\"☑️\" /></td>";
			}
			echo "</tr>";
		}
		
		echo "</table>";
	}

	else
	{
		echo "<span style=\"font-size:128px\">🗇</span><br /><br />The employee list is empty...";
	}
}

else
{
	echo "<span style=\"font-size:128px\">🙀</span><br /><br />Connection to the database failed or something, get the sysadmin.<br /><br />" . $dbconnection->error;
}

$dbconnection->close();
?>

<br /><br />
<a href="./index.html" style="text-decoration:none;"><button style="font-size:24px;cursor:pointer;">⬅️ Back</button></a>

</body>
</html>