<?php
require_once('database.php');

class DresseurDAO {
    //déclaration de la variable de connexion à la DB en private
    private $db_connect;
    //! à définir en dehors de la base de données pour éviter de la rappeler systématiquement

    //fonction pour insérer un nouvel utilisateur dans la base de données
    public function insert($data) {
        //récupération de la connexion à la base de données depuis la fonction connectToDB() définie dans le fichier database.php
        $db_connect = connectToDB();

        //récupération des données envoyées par le formulaire
        $firstname= $data['firstname'];
        $lastname = $data['lastname'];
        $birthday = $data['birthday'];
        $mail = $data['mail'];
        $nickname = $data['nickname'];
        $password = $data['password'];

        //hachage du mot de passe avec l'algorithme de hachage SHA-256
        $password = hash('sha256', $password);

        //préparation de la requête d'insertion
        $statement = $db_connect->prepare(" INSERT INTO Dresseur (firstname,lastname,birthday,mail,nickname,password) VALUES (:firstname,:lastname,:birthday,:mail,:nickname,:password)");

        try {
            //exécution de la requête avec les paramètres fournis dans un tableau associatif
            $statement->execute(array(':firstname' => $firstname, ':lastname' => $lastname,':birthday'=> $birthday, ':mail'=>$mail,':nickname' => $nickname, ':password' => $password));
            return TRUE;
        }
        catch (PDOException $e){
            //affichage de l'erreur en cas d'échec de la requête
            echo "Erreur : ".$e->getMessage();
        }
    }

    //vérifier les informations d'authentification du dresseur
    public function verify($params) {
        //variable de connexion à la DB
        $db_connect = connectToDB();

        //nom d'utilisateur et mot de passe envoyés par le formulaire
        $nickname = $params['nickname'];
        $password = $params['password'];

        //hachage du mot de passe avec l'algorithme de hachage SHA-256
        $password = hash('sha256', $password);

        //préparation de la requête de sélection de l'utilisateur
        $statement = $db_connect->prepare("SELECT * FROM Dresseur WHERE `nickname` = :nickname");

        //liaison du paramètre :nickname à la valeur $nickname
        $statement->bindParam(':nickname', $nickname);

        //exécution de la requête
        $statement->execute();

        //récupération du résultat de la requête sous forme d'un tableau associatif
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($result != FALSE){
            if ($result['password'] == $password) {
                // si l'authentification est réussie = 10
                unset($result['password']);
                $isAdmin = isset($result['isAdmin']) ? $result['isAdmin'] : 0;
                return ['result' => 10, 'isAdmin' => $isAdmin, 'dresseur' => $result];
            } else {
                // si le mot de passe est incorrect = 12
                return ['result' => 12, 'isAdmin' => 0];
            }
        } else {
            // si le user est introuvable dans la DB =11
            return ['result' => 11, 'isAdmin' => 0];
        }
    }

    public function getAllDresseurs() {
        // Récupérer toutes les entrées de la table Dresseur
        try {
            // Se connecter à la base de données
            $db = connectToDB();

            // Écrire une requête SQL pour sélectionner toutes les entrées de la table Dresseur
            $query = 'SELECT * FROM Dresseur';

            // Exécuter la requête SQL
            $result = $db->query($query);
            
            $allDresseurs = $result->fetchAll(PDO::FETCH_ASSOC);
            return $allDresseurs;

            // Fermer la connexion à la base de données
            $db = null;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}