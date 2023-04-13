<?php
require_once 'database.php';

class PokemonDAO {
    private $db_connect;

    public function getAllPokemon() {
        // Récupérer toutes les entrées de la table Pokemon
        try {
            // Se connecter à la base de données
            $db = connectToDB();

            // Écrire une requête SQL pour sélectionner toutes les entrées de la table Pokemon
            $query = 'SELECT * FROM Pokemon';

            // Exécuter la requête SQL
            $result = $db->query($query);

            $allPokemons= $result->fetchAll(PDO::FETCH_ASSOC);
            return $allPokemons;

            // Fermer la connexion à la base de données
            $db = null;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}