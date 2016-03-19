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

?>
