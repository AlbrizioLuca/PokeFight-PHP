<?php

class Fight extends Controller {

    public function index() {
        session_start();
        $nickname = $_SESSION['nickname'];
        $score = $_SESSION['score'];
    
        $dresseur1 = new Dresseur($nickname, $score);        
        $professeur = new Dresseur("Prof.Chen", 0);

        $pokemonDAO = new PokemonDAO;
        echo '<pre>';
        $allPokemons = $pokemonDAO->getAllPokemon();
        $choicePokemon1 = mt_rand(0, count($allPokemons) - 1);
        $choicePokemon2 = mt_rand(0, count($allPokemons) - 1);
        
        var_dump($choicePokemon1);
        var_dump($choicePokemon2);

        $combat = new Combat($allPokemons[$choicePokemon1], $allPokemons[$choicePokemon2], $dresseur1, $professeur);
        $combat->attaque();

        $combat->attaque();

        $combat->soigne();

        $combat->soigne();

        $this->render('fight_tpl');
    }
}
