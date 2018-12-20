<?php
/*
 * 3rd setup: update row to pass to game.php
 */
define("IN_CODE", 1);
include ("dbconfig.php");
include ("game_file.php");
$cookie_name = "kean_negotiation";

$partner = $_POST["employment"];
// echo $partner;
$info = checkCookie($cookie_name);
if ($info == 0)
    echo "No information saved";
else {
    $cookie = explode(",", $info);
    $table = getTable($cookie[1]);
    $status = checkStatus($cookie[0], $table);
    if ($status == FALSE) {
        updateRow($partner, $cookie[0], $table);
        header("Location: game.php");
    } elseif ($status == TRUE) {
        header("Location: game.php");
    }
}

?>