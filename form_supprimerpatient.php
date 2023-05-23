<?php
    include("connexion.php");

//---------------- LISTE DES Patients 
//on veut afficher les patients déjà dans la base 
//Requete par ordre croisssant 
$pdoStat = $db->prepare('SELECT * FROM patient ORDER BY Nom_pat ASC');


//execute requete pour afficher 
$executeIsOk = $pdoStat->execute(); 

//récupère données 
$patients = $pdoStat->fetchAll(); //chercher toutes les données
?>



<!DOCTYPE HTML>
<html>
<head>
    <title> Supprimer Patient </title>
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
                        <h2> Liste des patients </h2>
                        <p> Vous pouvez modifier ou supprimer le contact d'un patient. </p>
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
            <th>Date de naissance </th>
            <th>Sexe </th>
            <th>Mutuelle </th>
            <th>Groupe sanguin </th>
            <th>Date de création du dossier</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($patients as $patient): ?>
            <tr>
                <td><?= $patient["Nom_pat"] ?></td>
                <td><?= $patient["Prenom_pat"] ?></td>
                <td><?= $patient["Adresse_pat"] ?></td>
                <td><?= $patient["Tel_pat"] ?></td>
                <td><?= $patient["Mail_pat"] ?></td>
                <td><?= $patient["Date_naiss_pat"] ?></td>
                <td><?= $patient["Sexe_pat"] ?></td>
                <td><?= $patient["Mutu_pat"] ?></td>
                <td><?= $patient["GS_pat"] ?></td>
                <td><?= $patient["Date_Crea_dossier"] ?></td>
                <td>
                    <a href="supprimerpatient.php?numContact=<?= $patient['Id_pat'] ?>">Supprimer</a>
                    <a href="form_modifierpatient.php?numContact=<?= $patient['Id_pat'] ?>">Modifier</a>
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


