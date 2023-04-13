<?php 
include('header_tpl.php');
?>

<h3>Admin Dashboard</h3>

<?php
echo $message['msg'];

echo "<pre>";
// var_dump($allPokemons);
// var_dump($allDresseurs);
?>

<style>
th, td {
    border: 1px solid black;
    padding: 5px;
    text-align: center;
}
</style>
<!-- ---------------------------------------------------------- -->
<table>
    <thead>
        <tr> Les dresseurs enregistrés dans la base de donnée
            <th>ID</th>   
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Mail</th>
            <th>Pseudo</th>
            <th>Score Actuel</th>
            <th>Admin</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allDresseurs as $dresseur): ?>
            <tr>
                <td><?php echo $dresseur['id_dresseur'] ?></td>
                <td><?php echo $dresseur['firstname'] ?></td>
                <td><?php echo $dresseur['lastname'] ?></td>
                <td><?php echo $dresseur['birthday'] ?></td>
                <td><?php echo $dresseur['mail'] ?></td>
                <td><?php echo $dresseur['nickname'] ?></td>
                <td><?php echo $dresseur['score'] ?></td>
                <td><?php echo $dresseur['isAdmin'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- ----------------------------------------- -->
<table>
    <thead>
        <tr> Les pokémons enregistrés dans la base de donnée
            <th>ID</th>
            <th>Nom</th>
            <th>Type</th>
            <th>Point Combat</th>
            <th>PV</th>
            <th>PV MAX</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allPokemons as $pokemon): ?>
            <tr>
                <td><?php echo $pokemon['id_pokemon'] ?></td>
                <td><?php echo $pokemon['nom'] ?></td>
                <td><?php echo $pokemon['type'] ?></td>
                <td><?php echo $pokemon['point_combat'] ?></td>
                <td><?php echo $pokemon['pv'] ?></td>
                <td><?php echo $pokemon['pv_max'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
include('footer_tpl.php');
?>