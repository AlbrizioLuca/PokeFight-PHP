<?php

//fonction qui permet de se connecter à la base de données
function connectToDB()
{
    //informations de connexion
    $host = "db-PokeFight"; //nom de l'hôte (serveur de base de données)
    $user = "Albrizio"; //nom de l'utilisateur de la base de données
    $pass = "pokemon1234"; //mot de passe de l'utilisateur de la base de données
    $dbname = "PokeFight"; //nom de la base de données

    try {
        //instanciation de la connexion à la base de données
        $dbPokeFight = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        //configuration du mode d'erreur pour lever des exceptions en cas d'erreur de requête
        $dbPokeFight->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        //affichage de l'erreur en cas d'échec de la connexion
        echo "Erreur : " . $e->getMessage();
    }
    //retourne l'objet de connexion à la base de données
    return $dbPokeFight;
}