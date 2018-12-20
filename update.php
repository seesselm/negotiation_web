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
    $table = getTable($cookie[1]);
    $status = checkStatus($cookie[0], $table);
    if ($status == FALSE) {
        echo "You cannot access this directly";
    } elseif ($status == TRUE) {
        $form = $_POST['field'];
        $i = $_POST['i'];
        $select = $_POST['select'];
        // echo $form."<br>";
        // echo $i."<br>";
        // echo $select."<br>";
        updateRowForm($form, $i, $select, $cookie[0], $table);
        header("Location: game.php");
    }
}

?>