<?php

function connectDB()
{
    try
    {
        $pdo = new PDO('mysql:host=localhost;dbname=hackathon;charset=utf8', 'root', 'YES');
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
        return $userId['ID'];
    }
    catch (PDOException $e)
    {
        //NOTE: possible security problem with $e->errorMessage
        die($e->getMessage());
    }
}

function getProjects($db)
{
    try
    {
        $request = $db->query("SELECT ID, Nom, Description FROM projet");
        return $request->fetchAll();
    }
    catch (PDOException $e)
    {
        //NOTE: possible security problem with $e->errorMessage
        die($e->getMessage());
    }
}

function getPropositionsForProject($db, $projId)
{
    try
    {
        $request = $db->prepare("SELECT ID, Entreprise, MaquetteUnity, Description, Prix FROM offreent WHERE Projet = ?");
        $request->execute(array($projId));
        $data = $request->fetchAll();
        return $data;
    }
    catch (PDOException $e)
    {
        //NOTE: possible security problem with $e->errorMessage
        die($e->getMessage());
    }
}

function addVote($pdo, $userID, $vote, $offre)
{
    try
    {
        $pdo->beginTransaction();
        $request = $pdo->prepare("INSERT INTO vote(Etat, Utilisateur, offre) VALUES(:vote, :user, :offre)");
        $request->execute(array('vote'=>$vote, 'user'=>$userID, 'offre'=>$offre));
        $pdo->commit();
    }
    catch (PDOException $e)
    {
        $pdo->rollBack();
        die($e->errorMessage());
    }
}

function addComment($pdo, $userID, $comment, $offre)
{
    try
    {
        $pdo->beginTransaction();
        $request = $pdo->prepare("INSERT INTO commentaire(Texte, utilisateur, offre) VALUES(:texte, :user, :offre)");
        $request->execute(array('texte'=>$comment, 'user'=>$userID, 'offre'=>$offre));
        $pdo->commit();
    }
    catch (PDOException $e)
    {
        $pdo->rollBack();
        die($e->errorMessage());
    }
}

?>
