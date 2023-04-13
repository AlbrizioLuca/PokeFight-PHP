<?php 
include('header_tpl.php');
?>
    <div>
        <h1>Welcome to PokeFight</h1>
        <p>Veuillez vous connecter avec vos identifiants:</p>
        <form method="POST" action="/Signin/checkDresseur" >
            <input type="text" name="nickname" placeholder="Nom d'utilisateur" required/>
            <input type="password" name="password" placeholder="Mot de passe" required/>
            <button>Se connecter</button>
        </form>
        <p>Sinon inscrivez vous en suivant le lien: <a href="/Signin">Inscription</a>
        </p>
    </div>
<?php
include('footer_tpl.php');
?>