<!-- ____________________________________________ Connexion à la base de données
Ici connexion a la BD locale --> 
<?php 
//On récupère d'abord écupération les données de la base 
include("connexion.php");

// ____________________________________________ Formulaire 
// Vérification si le formulaire est soumis
if (isset($_POST['Valider'])) {
    // Récupération des données du formulaire
    $nommed = $_POST['Nom_med'];
    $prenommed = $_POST['Prenom_med'];
    $adressemed = $_POST['Adresse_med'];
    $telmed = $_POST['Tel_med'];
    $mailmes = $_POST['Mail_mes'];

    // Préparation de la requête d'insertion
    $req = "INSERT INTO medecin (nom_med, prenom_med, adresse_med, tel_med, mail_mes) 
            VALUES (:nom_med, :prenom_med, :adresse_med, :tel_med, :mail_mes)";

    // Préparation de la requête avec PDO
    $requete = $db->prepare($req);

    // Assignation des valeurs aux paramètres de la requête
    $requete->bindParam(':nom_med', $nommed);
    $requete->bindParam(':prenom_med', $prenommed);
    $requete->bindParam(':adresse_med', $adressemed);
    $requete->bindParam(':tel_med', $telmed);
    $requete->bindParam(':mail_mes', $mailmes);

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
            <li><a href="médecin.tpl.html">Médecin</a></li>
            <li><a href="patient.tpl.html">Patient</a></li>
            <li><a href="rdv.tpl.htmlm">Prise de RDV</a></li>
        </ul>
    </nav>

    <!-- Banner -->
    <!-- Introduction avant d'afficher la liste -->
<section align="center" style="background-color: white;>
					<div class="content" style="color: black;">
</div>
				</section>

<!-- ______________________ affichage du formulaire ____________________________ --> 
 <form action="ajoutmédecin.php" method="POST"> 
    <fieldset>
        <h2> Veuillez remplir ce formulaire - médecin </h2>
        <p> Nom du medecin: <input type="text" name="Nom_med" size="40"/> </p>
        <p> Prenom du medecin: <input type="text" name="Prenom_med" size="40"/> </p>
        <p> Adresse du medecin : <input type="text" name="Adresse_med" size="40"/> </p>
        <p> Telephone du medecin : <input type="text" name="Tel_med" size="40"> </p>
        <p> Email du medecin : <input type="text" name="Mail_mes" size="40"> </p>

        <p>
            <input type="submit" name="Valider" value="Valider"/>
            <input type="reset" name="Annuler" value="Annuler"/>
        </p>
    </fieldset>
</form>


</body>
</html>

