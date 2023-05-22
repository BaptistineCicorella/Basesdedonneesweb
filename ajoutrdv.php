<?php
// Connexion à la base de données
// clef primaire en auto increment via le code sql 

include("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Préparation de la requête d'insertion
    $req = "INSERT INTO consultation (date_consult, H_dbt_consult, H_fin_consult, Id_med, Id_pat) 
            VALUES (:date_consult, :H_dbt_consult, :H_fin_consult, :Id_med, :Id_pat)";

    // Préparation de la requête avec PDO
    $requete = $db->prepare($req);

    // Assignation des valeurs aux paramètres de la requête
    $requete->bindParam(':date_consult', $_POST['date_consult']);
    $requete->bindParam(':H_dbt_consult', $_POST['H_dbt_consult']);
    $requete->bindParam(':H_fin_consult', $_POST['H_fin_consult']);
    $requete->bindParam(':Id_med', $_POST['Id_med']);
    $requete->bindParam(':Id_pat', $_POST['Id_pat']);

    // Exécution de la requête
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
            <li class="current"><a href="menu.html">Menu</a></li>
            <li><a href="médecin.tpl.html">Médecin</a></li>
            <li><a href="patient.tpl.html">Patient</a></li>
            <li><a href="rdv.tpl.html">Prise de RDV</a></li>
        </ul>
    </nav>

    <!-- Banner -->
    <section id="banner">
        <div class="content">
            <h2>Ajouter une consultation</h2>
        </div>
    </section>

    <form action="ajoutrdv.php" method="POST">
        <fieldset>
            <h2>Veuillez remplir le formulaire - Consultation</h2>
            <p> Date de consultation : <input type="text" name="date_consult" size="40"/></p>
            <p> Heure de début : <input type="text" name="H_dbt_consult" size="40"/></p>
            <p> Heure de fin : <input type="text" name="H_fin_consult" size="40"/></p>
            <p> Identifiant du patient : <input type="text" name="Id_pat" size="40"></p>
            <p> Identifiant du médecin : <input type="text" name="Id_med" size="40"></p>
            <p>
                <input type="submit" name="Valider" value="Valider"/>
                <input type="reset" name="Annuler" value="Annuler"/>
            </p>
        </fieldset>
    </form>
</div>
</body>
</html>
