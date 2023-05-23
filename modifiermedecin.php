<?php
// ------------ CONNEXION 
// Connexion à la base de données
//On récupère d'abord écupération les données de la base 
include("connexion.php");

//---------------- LISTE DES MEDECINS 
//préparation requete 
$pdoStat = $db->prepare('UPDATE medecin set Nom_med=:Nom_med, Prenom_med=:Prenom_med, Adresse_med=:Adresse_med, Tel_med=:Tel_med, Mail_mes=:Mail_mes WHERE Id_med=:num LIMIT 1'); // on utilise 1 pour limiter la modif à une ligne par execution // MAJ sauf l'id qui est auto incrémenté.
//liaison du paramètre / les associer à une valeur :
$pdoStat-> bindValue(':num', $_POST['numContact'], PDO::PARAM_INT); //il s'agit d'une valeur de type int
$pdoStat-> bindValue(':Nom_med', $_POST['Nom_med'], PDO::PARAM_STR); //il s'agit d'une valeur de type int
$pdoStat-> bindValue(':Prenom_med', $_POST['Prenom_med'], PDO::PARAM_STR); //il s'agit d'une valeur de type int
$pdoStat-> bindValue(':Adresse_med', $_POST['Adresse_med'], PDO::PARAM_STR); //il s'agit d'une valeur de type int
$pdoStat-> bindValue(':Tel_med', $_POST['Tel_med'], PDO::PARAM_STR); //il s'agit d'une valeur de type int
$pdoStat-> bindValue(':Mail_mes', $_POST['Mail_mes'], PDO::PARAM_STR); //il s'agit d'une valeur de type int

//execution de la requete 
$executeIsOk = $pdoStat->execute();

if ($executeIsOk){
    $message = 'contact mis à jour' ;
} else {
    $message = 'echec de la maj';
}

?>


<!DOCTYPE HTML>
<html>
<head>
    <title> Modifier la page contact d'un médecin  </title>
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
                        <h1> Modification d'un médecin dans la base de données </h1>
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
            <li><a href="rdv.tpl.html"> Consultations </a></li>
        </ul>
    </nav> <br>
    <h1 align="center"> <?= $message ?> </h1> <!--on affiche le message de confirmation ou d'erreur --> 
    <p align="center"> <a href=form_supprimermedecin.php> Retour à la liste </a> </p>

</body>
</html>