<?php
session_start();
include_once("databaseFuncs.php");

header("Content-type: text/plain");

if(isset($_GET['offre']) && isset($_GET['value']))
{
    $db = connectDB();
    $vote = ($_GET['value'] == 0) ? false : true;
    $offre = intval($_GET['offre']);
    addVote($db, $_SESSION['userId'], $vote, $offre);
    echo "OK";
}
else
{
    echo "FAIL";
}
?>
