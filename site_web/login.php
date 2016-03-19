<?php
session_start();

include_once('databaseFuncs.php');

if(isset($_SESSION['connected']) && $_SESSION['connected'])
    header('Location:./projets.php');
else
{
    try
    {
        $db = connectDB();
        $req = $db->prepare('SELECT * FROM utilisateur WHERE Pseudo = ?');
        $req->execute(array($_POST['username']));
        if(count($req->fetchAll()) > 0 || $_POST['username'] == 'test@test.com')//FIXME: make it secure !
        {
            $_SESSION['connected'] = true;
            $_SESSION['userId'] = getUserId($db, $_POST['username']);
            header('Location:./projets.php');
        }
        else
        {
            $_SESSION['connectionError'] = true;
            header('Location:./');
        }
    }
    catch(Exception $e)
    {
        die($e->getMessage());
    }
}
?>
