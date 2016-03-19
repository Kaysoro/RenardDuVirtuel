<?php

function connectDB()
{
    try
    {
        $pdo = new PDO('mysql:host=localhost;dbname=hackaton;charset=utf8', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch (Exception $e)
    {
        //NOTE: possible security data leak by displaying $e->getMessage()
        die($e->getMessage());
    }
}

function getUserId($db, $username)
{
    try
    {
        $request = $db->prepare("SELECT ID FROM utilisateur WHERE Pseudo = ? LIMIT 1");
        $request->execute(array($username));
        $userId = $request->fetch();
        $request->closeCursor();
        return $userId;
    }
    catch (PDOException $e)
    {
        //NOTE: possible security problem with $e->errorMessage
        die($e->getMessage());
        echo "NOK";
    }
}

function addVote($pdo, $userID, $vote, $offre)
{
    try
    {
        $pdo->beginTransaction();
        $request = $db->prepare("INSERT INTO vote(Etat, Utilisateur, offre) VALUES(:vote, :user, :offre)");
        $request->execute(array('vote'=>$vote, 'user'=>$userID, 'offre'=>$offre));
        $pdo->commit();
    }
    catch (PDOException $e)
    {
        $pdo->rollBack();
        die($e->errorMessage());
    }
}

?>