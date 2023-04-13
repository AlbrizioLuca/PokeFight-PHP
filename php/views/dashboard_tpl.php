<?php 
include('header_tpl.php');
?>

<h3>Dashboard User</h3>

<?php
echo "Bienvenue ". $dresseur['nickname']. ", jeune Dresseur Pokemon. <br>";
echo "Ci dessous les informations que tu as saisie lors de ton inscription: <br>";
?>
<br>
<style>
  th, td {
    border: 1px solid black;
    padding: 5px;
    text-align: center;
  }
</style>
<table >
  <tr>
    <th>Prénom</th>
    <th>Nom</th>
    <th>Date de Naissance</th>
    <th>Email</th>
    <th>Score</th>
  </tr>
  <tr>
    <td><?php echo $dresseur['firstname'] ?></td>
    <td><?php echo $dresseur['lastname'] ?></td>
    <td><?php echo $dresseur['birthday'] ?></td>
    <td><?php echo $dresseur['mail'] ?></td>
    <td><?php echo $dresseur['score'] ?></td>
  </tr>
</table>
<br>
<a href="/Fight">Combat</a>

<?php
include('footer_tpl.php');
?>