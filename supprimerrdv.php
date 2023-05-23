<?php
// ------------ CONNEXION 
// Connexion à la base de données
//On récupère d'abord écupération les données de la base 
include("connexion.php");

//---------------- LISTE DES MEDECINS 
//on veut afficher les médecins déjà dans la base 
//Requete pour supp
$pdoStat = $db->prepare('DELETE FROM consultation WHERE Id_consult=:num LIMIT 1'); // on utilise 1 pour limiter la suppression à une ligne par execution 

//liaison du paramètre nommé
$pdoStat-> bindValue(':num', $_GET['numContact'], PDO::PARAM_INT); //il s'agit d'une valeur de type int


//execution de la requete 
$executeIsOk = $pdoStat->execute();

if ($executeIsOk) {
    $message = "la consultation a été supprimée ! " ;

} else {
    $message = "aie aie aie";
}
?>


<!DOCTYPE HTML>
<html>
<head>
    <title> Liste des consultations </title>
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
                        <h1> Suppression d'une consultation dans la base de données </h1>
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
            <li><a href="patient.tpl.html">Patients </a></li>
            <li><a href="rdv.tpl.html">Consultations </a></li>
        </ul>
    </nav> <br>
    

    <h1 align="center"> <?= $message ?> </h1> <!--on affiche le message de confirmation ou d'erreur --> 
    <p align="center"> <a href=form_supprimerrdv.php> Retour à la liste  </a> </p>


</body>
</html>