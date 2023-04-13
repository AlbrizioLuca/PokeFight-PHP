<?php

class Signin extends Controller {

    public function index()
    {
        // Affiche la page de connexion
        $this->render('signin_tpl');
    }

    public function record()
    {
        
        // Instancie un nouvel objet DresseurDAO
        $newDresseur = new DresseurDAO;

        // Si l'insertion est réussie
        if ($newDresseur->insert($_POST)) { 
            // Stocke un message dans le tableau d'informations
            $info['message'] = ['msg' => 'Dresseur bien créé']; 
            // Définit le tableau d'informations
            $this->set($info); 
            // Affiche la page du tableau de bord
            $this->render('dashboard_tpl');

            // Si l'insertion échoue déclenche une erreur utilisateur
        } else { 
            trigger_error('Erreur dans le formulaire',E_USER_WARNING);
        }
    }

    public function checkDresseur() {
        session_start();

        // Instancie un nouvel objet DresseurDAO
        $checkDresseur = new DresseurDAO; 

        $verifyResult = $checkDresseur->verify($_POST);
        $dresseur = $verifyResult['dresseur'];
        // var_dump($dresseur);
        $result = $verifyResult['result'];
        $isAdmin = $verifyResult['isAdmin'];

        // Si la vérification du dresseur est réussie
        if ($result === 10) {
            // Si l'utilisateur est administrateur 
            if ($isAdmin) {
                // Stocke un message dans le tableau d'informations
                $data['message'] = ['msg' => "Bienvenue ". $_POST['nickname']. ", Maitre de la Ligue Pokemon"];
                
                $pokemonDAO = new PokemonDAO;
                $allPokemons['allPokemons'] = $pokemonDAO->getAllPokemon();
                $this->set($allPokemons);

                $dresseurDAO = new DresseurDAO;
                $allDresseurs['allDresseurs'] = $dresseurDAO->getAllDresseurs();
                $this->set($allDresseurs);
                
                // Définit le tableau d'informations
                $this->set($data); 
                // Redirige vers la page d'administration
                $this->render('admin_tpl');

            } else {    // Sinon le dresseur n'est pas admin 
                // Message différent et définit le tableau d'informations
                $_SESSION['nickname'] = $dresseur['nickname'];
                $_SESSION['score'] = $dresseur['score'];

                $data['dresseur'] = $dresseur;
                $this->set($data); 
                // Puis redirige vers la page du tableau de bord utilisateur
                $this->render('dashboard_tpl');
            }

        // Si l'utilisateur est inconnu déclenche une erreur utilisateur
        } elseif ($result === 11){ 
            trigger_error("Utilisateur inconnu au bataillon, vérifier le nickname, ou bien veuillez vous inscrire", E_USER_WARNING); 
            // Si le mot de passe est incorrect déclenche une erreur utilisateur
        } elseif ($result === 12){ 
            trigger_error("Mot de passe incorrect", E_USER_WARNING); 
            // Si aucune des conditions précédentes n'est remplie déclenche une erreur utilisateur
        } else { 
            trigger_error("Houston on a un problème !" , E_USER_WARNING); 
        }
    }
}