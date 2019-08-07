<!DOCTYPE html>
<html>
<head>
<title>QDVisitorReception</title>
<style>
body
{
	font-family:'Georgia',serif;
	background:#d4d4d4;
}

form
{
	background:#fafafa;
}

input
{
	width:90%;height:40px;
}
</style>
</head>
<body>

<form id="bezoeker" method="post" action="verwerken.php">
	<fieldset>
	<legend>Visitor</legend>
		<label for="naam">Name</label>
		<br />
		<input name="naam" type="text" placeholder="Henk de Vries" required />
		<br />
		<br />
		<label for="meel">E-mail address</label>
		<br />
		<input name="meel" type="email" placeholder="henk.devries@sprunksoda.com" required />
		<br />
		<br />
		<label for="bedrijf">Organisation</label>
		<br />
		<input name="bedrijf" type="text" placeholder="Sprunk Enterprises Ltd" required />
		<br />
		<br />
		<input name="invoeren" type="submit" value="🖋 Enter" style="font-weight:bold;font-size:24px;cursor:pointer;" />
	</fieldset>
</form>
<br />
<br />
<a href="./index.php" style="text-decoration:none;"><button style="font-size:24px;cursor:pointer;">⬅️ Back</button></a>

</body>
</html>