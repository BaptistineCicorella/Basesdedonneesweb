<?php
// Connexion à la base de données
//On récupère d'abord écupération les données de la base 
include("connexion.php");

// Vérification si le formulaire est soumis
if (isset($_POST['Valider'])) {
    // Récupération des données du formulaire
    
    $nompat = $_POST['nom_pat'];
    $prenompat = $_POST['prenom_pat'];
    $adressepat = $_POST['adresse_pat'];
    $telpat = $_POST['tel_pat'];
    $mailpat = $_POST['mail_pat'];
    $datenaiss = $_POST['date_naiss_pat'];
    $sexepat = $_POST['Sexe_pat'];
    $mutuel = $_POST['mutu_pat'];
    $gs_pat = $_POST['GS_pat'];
    $datedossier = $_POST['Date_Crea_dossier'];

    // Préparation de la requête d'insertion
    $req = "INSERT INTO patient (nom_pat, prenom_pat, adresse_pat, tel_pat, mail_pat, date_naiss_pat, sexe_pat, mutu_pat, GS_pat, Date_Crea_dossier) 
    VALUES (:nom_pat, :prenom_pat, :adresse_pat, :tel_pat, :mail_pat, :date_naiss_pat, :sexe_pat, :mutu_pat, :GS_pat, :Date_Crea_dossier)";

    // Préparation de la requête avec PDO
    $requete = $db->prepare($req);

    // Assignation des valeurs aux paramètres de la requête
    $requete->bindParam(':nom_pat', $nompat);
    $requete->bindParam(':prenom_pat', $prenompat);
    $requete->bindParam(':adresse_pat', $adressepat);
    $requete->bindParam(':tel_pat', $telpat);
    $requete->bindParam(':mail_pat', $mailpat);
    $requete->bindParam(':date_naiss_pat', $datenaiss);
    $requete->bindParam(':sexe_pat', $sexepat);
    $requete->bindParam(':mutu_pat', $mutuel);
    $requete->bindParam(':GS_pat', $gs_pat);
    $requete->bindParam(':Date_Crea_dossier', $datedossier);

 


//Validation
if ($requete->execute()) {
    echo 'Données enregistrées !';
} else {
    echo 'Erreur lors de l\'enregistrement des données : ' . $requete->errorInfo()[2];
}
} 

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>CICORELLA - HAMMADOU</title>
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
                        <h1>Bienvenue sur le site du Cabinet médical CICORELLA - TRUC</h1>
                    </a>
                </h1>
            </div>
        </div>
    </header>

    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li class="current"><a href="menu.html">Menu </a></li>
            <li><a href="médecin.tpl.html">Médecins </a></li>
            <li><a href="patient.tpl.html">Patients </a></li>
            <li><a href="rdv.tpl.html"> Consultations </a></li>
        </ul>
    </nav>

  

    <form action="ajoutpatient.php" method="POST">
        <fieldset>
            <h2>Veuillez remplir le formulaire - patient</h2>
            <p>Nom : <input type="text" name="nom_pat" size="40" /> </p>
            <p>Prénom : <input type="text" name="prenom_pat" size="40"/></p>
            <p>Adresse : <input type="text" name="adresse_pat" size="40"/></p>
            <p>Téléphone du patient : <input type="text" name="tel_pat" size="40"></p>
            <p>Email du patient : <input type="text" name="mail_pat" size="40"></p>
            <p>Date de naissance : <input type="text" name="date_naiss_pat" size="40"></p>
            <p>Sexe : <input type="text" name="Sexe_pat" size="40"></p>
            <p>Mutuelle : <input type="text" name="mutu_pat" size="40"></p>
            <p>Groupe sanguin : <input type="text" name="GS_pat" size="40"></p>
            <p>Date de création du dossier : <input type="text" name="Date_Crea_dossier" size="40"></p>
            <p>
                <input type="submit" name="Valider" value="Valider"/>
                <input type="reset" name="Annuler" value="Annuler"/>
            </p>
        </fieldset>
    </form>
</div>
</body>
</html>
