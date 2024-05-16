<?php
    try
    {
        //host = l'adresse du serveur
        //dbname = nom de la bd 
        //"root" = nom d'utiliteur sur le serveur 
        $bdd=new PDO('mysql:host=localhost;dbname=quizz_bd;charset=utf8','root','');
    }
    catch(Exception $e)
    {
        die('erreur'.$e->getMessage());
    }
?>