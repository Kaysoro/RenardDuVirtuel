<?php
session_start();
include_once("databaseFuncs.php");

header("Content-type: text/plain");

if(isset($_GET['offre']) && isset($_GET['value']) && $_SESSION['votes'][$_GET['offre']] == 0)
{
    $db = connectDB();
    $vote = ($_GET['value'] == 0) ? false : true;
    $offre = intval($_GET['offre']);
    addVote($db, $_SESSION['userId'], $vote, $offre);

    $_SESSION['votes'] = getVotes($db, $_SESSION['userId']);

    echo "OK";
}
else
{
    echo "FAIL";
}
?>
