<?php
//Do mysql calls to initialize a new DB entry depending on what emplyment is
//generate cookie
//-cookie has employment field(for DB), ID field, Partner ID field, Counter, 5 data fields
//-counter is used to input the order of fields filled in
//go to init2
?>

<html>
<head>
<title>Negotiation Game</title>
</head>
<body>
	<h3>Your information</h3>
	<br>
	<br>
	<b>Please enter your partner's information</b>
	<form action="init2.php" method="post">
		<input type="number" value="employement"> 
		<input type="submit" value="Submit">
	</form>
</body>
</html>