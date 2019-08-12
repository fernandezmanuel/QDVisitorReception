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

input#visitorname
{
	width:80%;height:40px;
}

input#submitname
{
	font-size:20px;
	height:40px;
}
</style>
</head>
<body>
<?php
include('../configuration.php');

if((isset($_POST['visitorname'])))
{
	$visitorname = mysqli_real_escape_string($dbconnection, $_POST['visitorname']);
	
	if ($whovisitors = $dbconnection->query("SELECT * FROM visitor WHERE visitorname = '$visitorname' ORDER BY visitortime DESC"))
	{
		if ($whovisitors->num_rows > 0)
		{
			echo "<table border=\"1\" cellpadding=\"10\">";
			echo "<tr><th>Name</th><th>E-mail</th><th>Organisation</th><th>Arrival</th><th></th></tr>";

			while ($row = $whovisitors->fetch_object())
			{
				echo "<tr>";
				echo "<td>" . $row->visitorname . "</td>";
				echo "<td>" . $row->visitormail . "</td>";
				echo "<td>" . $row->visitororg . "</td>";
				echo "<td>" . $row->visitortime . "</td>";
				echo "<td><abbr title=\"Delete entry\" style=\"text-decoration:none\"><a href=\"delete.php?visitorname=" . $row->visitorname . "\" style=\"text-decoration:none\">❌</a></abbr></td>";
				echo "</tr>";
			}

			echo "</table><div style=\"font-family:sans-serif;position:fixed;right:5px;left:auto;top:auto;bottom:5px;border:1px solid #000000;width:300px;\"><div style=\"background:#0078D7;color:#fff;text-align:center;margin:2px 2px 2px 2px;\">ℹ</div><div style=\"margin:2px 2px 2px 2px;\">Press \"❌\" to delete your entry.</div></div>";
		}

		else
		{
			echo "<span style=\"font-size:128px\">🗇</span><br /><br />Hmmm... couldn't find \"$visitorname\"...";
		}
	}

	else
	{
		echo "<span style=\"font-size:128px\">🙀</span><br /><br />Connection to the database failed or something, get the sysadmin.<br /><br />" . $dbconnection->error;
	}

}

else
{
	echo "<form id=\"searchname\" method=\"post\" action=\"" .$_SERVER['PHP_SELF']. "\">
	<input id=\"visitorname\" name=\"visitorname\" type=\"text\" placeholder=\"Search for your name\" />
	<input id=\"submitname\" type=\"submit\" value=\"🔎\" /></form><div style=\"font-family:sans-serif;position:fixed;right:5px;left:auto;top:auto;bottom:5px;border:1px solid #000000;width:500px;\"><div style=\"background:#0078D7;color:#fff;text-align:center;margin:2px 2px 2px 2px;\">ℹ</div><div style=\"margin:2px 2px 2px 2px;\">Type your name in the search bar, and hit \"Enter\" or the \"🔎\" button.</div></div>";
}

$dbconnection->close();
?>
<br /><br />
<a href="./index.html" style="text-decoration:none;"><button style="font-size:24px;cursor:pointer;">⬅️ Back</button></a>
</body>
</html>