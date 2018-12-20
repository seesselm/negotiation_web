<?php
define("IN_CODE", 1);
include ("dbconfig.php");
include ("game_file.php");
$cookie_name = "kean_negotiation";

$info = checkCookie($cookie_name);
if ($info == 0)
    echo "No information saved";
else {
    $cookie = explode(",", $info);
}
?>

<html>
<head>
<title>Negotiation Game</title>
</head>
<body>
	<h3>Your information</h3>
	<?php echo "<br>ID:$cookie[0]"?>
	<br>
	<br>
	<b>Please enter your partner's information</b>
	<form action="init2.php" method="post">
		<input type="number" name="employment"> <input type="submit"
			value="Submit">
	</form>
</body>
</html>