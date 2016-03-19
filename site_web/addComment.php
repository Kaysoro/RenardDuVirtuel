<?php
session_start();

if(!isset($_SESSION['connected']) || !$_SESSION['connected'])
{
    header('Location:./');
    exit;
}

include_once('databaseFuncs.php');

$db = connectDB();
addcomment($db, $_SESSION['userId'], $_POST['comment'], $_POST['projPropId']);

header('Location:./projets.php');

?>
