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
    $table=getTable($cookie[1]);
    $status = checkStatus($cookie[0], $table);
    if ($status == FALSE) {
        echo "You cannot access this directly";
    } elseif ($status == TRUE) {
        $results = getInfo($cookie[0], $table);
        $game = explode("|", $results);
        $i = getI($game[2], $game[5], $game[8], $game[11], $game[14]);
        // echo "val of i:".$i;

        ?>
<html>
<head>
<title>Negotiation Game</title>
</head>
<body>
<?php
        if ($i < 6) { // echo $i;
            ?>
<br>
	<b>Salary</b>
	<br>
	<?php printSalary($game[0],$game[1],$i,$table);?>
	<br>
	<b>Vacation</b>
	<br>
	<?php printVacation($game[3],$game[4],$i,$table);?>
	<br>
	<b>Annual Raise</b>
	<br>
	<?php printAnnual($game[6],$game[7],$i,$table)?>
	<br>
	<b>Starting Date</b>
	<br>
	<?php printStart($game[9],$game[10],$i,$table)?>
	<br>
	<b>Medical</b>
	<br>
	<?php printMedical($game[12],$game[13],$i,$table)?>
	<br>
<?php
        } elseif ($i >= 6) {
            ?>
<b>Final results for <?php echo $cookie[0];?></b>
	<br>
Role: <?php echo $table;?>
<br>
Partner id:<?php echo $game[15]?>
<style>
table, th, td {
	border: 1px solid black;
}
</style>
	<table>
		<tr>
			<th>Category</th>
			<th>Selection</th>
			<th>Points</th>
			<th>Selected Order</th>
		</tr>
		<tr>
			<td><b>Salary</b></td>
			<td>$<?php echo $game[0]?></td>
			<td><?php echo $game[1]?></td>
			<td><?php echo $game[2]?></td>
		</tr>
		<tr>
			<td><b>Vacation</b></td>
			<td><?php echo $game[3]?></td>
			<td><?php echo $game[4]?></td>
			<td><?php echo $game[5]?></td>
		</tr>
		<tr>
			<td><b>Annual raise</b></td>
			<td><?php echo $game[6]?>%</td>
			<td><?php echo $game[7]?></td>
			<td><?php echo $game[8]?></td>
		</tr>
		<tr>
			<td><b>Start Date</b></td>
			<td><?php echo $game[9]?></td>
			<td><?php echo $game[10]?></td>
			<td><?php echo $game[11]?></td>
		</tr>
		<tr>
			<td><b>Medical</b></td>
			<td><?php echo $game[12]?>%</td>
			<td><?php echo $game[13]?></td>
			<td><?php echo $game[14]?></td>
		</tr>
	</table>
<?php }?>
</body>
</html>
<?php
    }
}

?>

