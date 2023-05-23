<?php
// ------------ CONNEXION 
// Connexion à la base de données
//On récupère d'abord écupération les données de la base 
include("connexion.php");

//---------------- LISTE DES PATIENTS 
//on veut afficher les patients déjà présentes dans la base 
//Requete pour modifier
$pdoStat = $db->prepare('SELECT * FROM patient WHERE Id_pat =:Id_pat'); 

//liaison du paramètre nommé : lié para num a une valeur
$pdoStat->bindValue(':Id_pat', $_GET['numContact'], PDO::PARAM_INT);

//execution de la requete 
$executeIsOk = $pdoStat->execute();

//récupérer le contact (patient)
$patient = $pdoStat->fetch() ;

?>


<!DOCTYPE HTML>
<html>
<head>
    <title> Modifier la fiche contact du médecin </title>
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
                        <h1> Modification de la fiche contact du médecin </h1>
                    </a>
                </h1>
            </div>

        </div>

        

    <title> Formulaire de modification patient </title>
    <form action="modifierpatient.php" method="POST">
        <h2> Veuillez remplir ce formulaire - patient </h2>
     <p>
     <input type="hidden" name="numContact" value="<?= $patient['Id_pat'] ?>">
     <p> Nom du patient: <input type="text" name="Nom_pat" size="40"value="<?= $patient['Nom_pat']; ?>"> </p>
        <p> Prenom du patient: <input type="text" name="Prenom_pat" size="40" value="<?= $patient['Prenom_pat']; ?>"></p>
        <p> Adresse du patient : <input type="text" name="Adresse_pat" size="40" value="<?= $patient['Adresse_pat']; ?>"> </p>
        <p> Telephone du patient : <input type="text" name="Tel_pat" size="40" value="<?= $patient['Tel_pat']; ?>"> </p>
        <p> Email du patient : <input type="text" name="Mail_pat" size="40" value="<?= $patient['Mail_pat']; ?>"> </p>
        <p> Date de naissance : <input type="text" name="Date_naiss_pat" size="40" value="<?= $patient['Date_naiss_pat']; ?>"></p>
        <p> Sexe du patient : <input type="text" name="Sexe_pat" size="40" value="<?= $patient['Sexe_pat']; ?>"> </p>
        <p> Mutuelle du patient : <input type="text" name="Mutu_pat" size="40" value="<?= $patient['Mutu_pat']; ?>"> </p>
        <p> Groupe sanguin du patient : <input type="text" name="GS_pat" size="40" value="<?= $patient['GS_pat']; ?>"> </p>
        <p> Date de création du dossier : <input type="text" name="Date_Crea_dossier" size="40" value="<?= $patient['Date_Crea_dossier']; ?>"> </p>

    </p> 

       
            <input type="submit" name="Valider" value="Enregistrer les modifications"/>
            <input type="reset" name="Annuler" value="Annuler les modifications"/>
            <a href="javascript:history.back()" class="bouton-retour">Retour</a>

        </p>
    </fieldset>
</form>

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

</body>
</html>