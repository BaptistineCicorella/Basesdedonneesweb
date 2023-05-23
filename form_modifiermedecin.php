<?php
// ------------ CONNEXION 
// Connexion à la base de données
//On récupère d'abord écupération les données de la base 
include("connexion.php");

//---------------- LISTE DES MEDECINS 
//on veut afficher les médecins déjà dans la base 
//Requete pour modifier
$pdoStat = $db->prepare('SELECT * FROM medecin WHERE Id_med =:Id_med'); 

//liaison du paramètre nommé : lié para num a une valeur
$pdoStat->bindValue(':Id_med', $_GET['numContact'], PDO::PARAM_INT);

//execution de la requete 
$executeIsOk = $pdoStat->execute();

//récupérer le contact (medecin)
$medecin = $pdoStat->fetch() ;

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

    <title> Formulaire de modification médecin </title>
    <form action="modifiermedecin.php" method="POST">
        <h2> Veuillez remplir ce formulaire - médecin </h2>
     <p>
     <input type="hidden" name="numContact" value="<?= $medecin['Id_med'] ?>">
     <p> Nom du medecin: <input type="text" name="Nom_med" size="40"value="<?= $medecin['Nom_med']; ?>"> </p>
        <p> Prenom du medecin: <input type="text" name="Prenom_med" size="40" value="<?= $medecin['Prenom_med']; ?>"></p>
        <p> Adresse du medecin : <input type="text" name="Adresse_med" size="40" value="<?= $medecin['Adresse_med']; ?>"> </p>
        <p> Telephone du medecin : <input type="text" name="Tel_med" size="40" value="<?= $medecin['Tel_med']; ?>"> </p>
        <p> Email du medecin : <input type="text" name="Mail_mes" size="40" value="<?= $medecin['Mail_mes']; ?>"> </p>

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