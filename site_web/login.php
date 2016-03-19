<?php
session_start();
//TODO: login

if(isset($_SESSION['connected']) && $_SESSION['connected'])
    header('Location:./projets.php');
else
{
    try
    {
        $pdo = new PDO('mysql:host=localhost;dbname=hackaton;charset=utf8', 'root', 'root');
        $req = $pdo->prepare('SELECT * FROM utilisateur WHERE Pseudo = ?');
        $req->execute(array($_POST['username']));
        if(count($req->fetchAll()) > 0 || $_POST['username'] == 'test@test.com')//FIXME: make it secure !
        {
            $_SESSION['connected'] = true;
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
