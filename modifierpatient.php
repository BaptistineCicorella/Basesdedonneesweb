<?php
// ------------ CONNEXION 
// Connexion à la base de données
// On récupère d'abord les données de la base 
include("connexion.php");

//---------------- LISTE DES PATIENT 
// Préparation de la requête
$pdoStat = $db->prepare('UPDATE patient SET Nom_pat = :Nom_pat, Prenom_pat = :Prenom_pat, Adresse_pat = :Adresse_pat, Tel_pat = :Tel_pat, Mail_pat = :Mail_pat, Date_naiss_pat = :Date_naiss_pat, Sexe_pat = :Sexe_pat, Mutu_pat = :Mutu_pat, GS_pat = :GS_pat, Date_Crea_dossier = :Date_Crea_dossier WHERE Id_pat = :num'); // Ne pas limiter la modification à une ligne

// Liaison des paramètres
$pdoStat->bindValue(':num', $_POST['numContact'], PDO::PARAM_INT);
$pdoStat->bindValue(':Nom_pat', $_POST['Nom_pat'], PDO::PARAM_STR);
$pdoStat->bindValue(':Prenom_pat', $_POST['Prenom_pat'], PDO::PARAM_STR);
$pdoStat->bindValue(':Adresse_pat', $_POST['Adresse_pat'], PDO::PARAM_STR);
$pdoStat->bindValue(':Tel_pat', $_POST['Tel_pat'], PDO::PARAM_STR);
$pdoStat->bindValue(':Mail_pat', $_POST['Mail_pat'], PDO::PARAM_STR);
$pdoStat->bindValue(':Date_naiss_pat', $_POST['Date_naiss_pat'], PDO::PARAM_STR);
$pdoStat->bindValue(':Sexe_pat', $_POST['Sexe_pat'], PDO::PARAM_STR);
$pdoStat->bindValue(':Mutu_pat', $_POST['Mutu_pat'], PDO::PARAM_STR);
$pdoStat->bindValue(':GS_pat', $_POST['GS_pat'], PDO::PARAM_STR);
$pdoStat->bindValue(':Date_Crea_dossier', $_POST['Date_Crea_dossier'], PDO::PARAM_STR);

// Exécution de la requête
$executeIsOk = $pdoStat->execute();

if ($executeIsOk) {
    $message = 'Contact patient mis à jour';
} else {
    $message = 'Échec de la mise à jour';
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Modifier la page contact d'un patient</title>
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
                        <h1>Modification d'un patient dans la base de données</h1>
                    </a>
                </h1>
            </div>
        </div>
    </header>
    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li class="current"><a href="menu.html">Menu</a></li>
            <li><a href="médecin.tpl.html">Médecins</a></li>
            <li><a href="patient.tpl.html">Patients</a></li>
            <li><a href="rdv.tpl.html">Consultations</a></li>
        </ul>
    </nav> <br>
    <h1 align="center"><?= $message ?></h1> <!-- On affiche le message de confirmation ou d'erreur -->
    <p align="center"><a href="form_supprimerpatient.php">Retour à la liste</a></p>
</body>
</html>
