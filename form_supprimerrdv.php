<?php
    include("connexion.php");

//---------------- LISTE DES MEDECINS 
//on veut afficher les médecins déjà dans la base 
//Requete par ordre croisssant 
$pdoStat = $db->prepare('SELECT * FROM consultation ORDER BY Id_consult ASC');


//execute requete pour afficher 
$executeIsOk = $pdoStat->execute(); 

//récupère données 
$rdvs = $pdoStat->fetchAll(); //chercher toutes les données
?>



<!DOCTYPE HTML>
<html>
<head>
    <title> Consultations </title>
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
                        <h2> Liste des consultations </h2>
                        <p> Vous pouvez modifier ou supprimer des consultations. </p>
</div>
				</section>

<!-- Afficher la liste des médecins déjà présent dans la base --> 
<table>
    <thead>
        <tr>
            <th>N° consultation </th>
            <th>Date de la consultation </th>
            <th>Heure de début </th>
            <th>Heure de fin </th>
            <th>identifiant du médecin </th>
            <th>identifiant du patient </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($rdvs as $rdv): ?>
            <tr>
                <td><?= $rdv["Id_consult"] ?></td>
                <td><?= $rdv["Date_consult"] ?></td>
                <td><?= $rdv["H_dbt_consult"] ?></td>
                <td><?= $rdv["H_fin_consult"] ?></td>
                <td><?= $rdv["Id_med"] ?></td>              
                <td><?= $rdv["Id_pat"] ?></td>
                <td>
                    <a href="supprimerrdv.php?numContact=<?= $rdv['Id_consult'] ?>">Supprimer</a>
                    <a href="form_modifierrdv.php?numContact=<?= $rdv['Id_consult'] ?>">Modifier</a>
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