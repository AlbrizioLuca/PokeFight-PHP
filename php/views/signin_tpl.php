<?php 
include('header_tpl.php');
?>
<p>Veuillez créer un compte utilisateur en renseignant les champs suivants:</p>
<form method="POST" action="Signin/record">
    <input type="text" name="firstname" placeholder="Prénom" required/><br>
    <input type="text" name="lastname" placeholder="Nom" required/><br>
    <input type="text" name="nickname" placeholder="Pseudo" required/><br>
    <input type="password" name="password" placeholder="Mot de passe" required/><br>
    <input type="email" name="mail" placeholder="exemple@mail.com" required/><br>
    <input type="date" name="birthday" required/><br>
    <button type="submit">Valider</button>
</form>

<?php
include('footer_tpl.php');
?>