<?php
    include("connexion.php");

//---------------- LISTE DES MEDECINS 
//on veut afficher les médecins déjà dans la base 
//Requete par ordre croisssant 
$pdoStat = $db->prepare('SELECT * FROM medecin ORDER BY Nom_med ASC');


//execute requete pour afficher 
$executeIsOk = $pdoStat->execute(); 

//récupère données 
$medecins = $pdoStat->fetchAll(); //chercher toutes les données
?>



<!DOCTYPE HTML>
<html>
<head>
    <title>Modifier Médecin</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
</head>
<body class="homepage is-preload">
<div id="page-wrapper">
    <!-- Header -->
    <header id="header">
        <div class="logo container">
            <div>
                <h1>
                    <a href="menu.html" id="logo">
                        <h1>Bienvenue sur le site du Cabinet médical CICORELLA - HAMMADOU </h1>
                    </a>
                </h1>
            </div>
        </div>
    </header>
    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li class="current"><a href="menu.html">Menu</a></li>
            <li><a href="médecin.tpl.html">Médecins </a></li>
            <li><a href="patient.tpl.html">Patients</a></li>
            <li><a href="rdv.tpl.html"> Consultations </a></li>
        </ul>
    </nav>

   
<!-- Introduction avant d'afficher la liste -->
<section align="center" style="background-color: #BBB4B3;>
					<div class="content" style="color: black;">
                        <h2> Liste des médecins </h2>
                        <p> Vous pouvez modifier ou supprimer le contact d'un médecin. </p>
</div>
				</section>

<!-- Afficher la liste des médecins déjà présent dans la base --> 
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($medecins as $medecin): ?>
            <tr>
                <td><?= $medecin["Nom_med"] ?></td>
                <td><?= $medecin["Prenom_med"] ?></td>
                <td><?= $medecin["Adresse_med"] ?></td>
                <td><?= $medecin["Tel_med"] ?></td>
                <td><?= $medecin["Mail_mes"] ?></td>
                <td>
                    <a href="supprimermedecin.php?numContact=<?= $medecin['Id_med'] ?>">Supprimer</a>
                    <a href="form_modifiermedecin.php?numContact=<?= $medecin['Id_med'] ?>">Modifier</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</section>
        </div>

   
</div>
     
</body>
</html>
