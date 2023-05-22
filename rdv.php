<?php
        $user = 'root';
        $pass='' ;

        try 
        { 
          $db = new PDO ('mysql:host=localhost;dbname=bddweb', $user, $pass) ; 
         //pour tester si ca marche : afficher les données de la base 
         // foreach ($db->query('SELECT * FROM patient ') as $row) { 
         //   print_r ($row);
         // }
        } catch (PDOException $e)
        {
          print "Erreur :" .$e->getMessage() . "<br/>" ;
          die ;
        }
?>

<!DOCTYPE HTML>
<!--
	TXT by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title> CICORELLA - HAMMADOU</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<div class="logo container">
						<div>
							<h1><a href="menu.html" id="logo"> Hello </a></h1>
						</div>
					</div>
				</header>

			<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="current"><a href="menu.html"> Menu </a></li>
						
						<li><a href="médecin.php"> Médecin </a></li>
						<li><a href="patient.php"> Patient</a></li>
						<li><a href="rdv.php"> Prise de RDV </a></li>
					</ul>
				</nav>

        	<!-- Banner -->
				<section id="banner">
					<div class="content">
						<h2> Rendez-vous </h2>
<						<p> Un patient souhaite un rdv ? Un autre annule ou modifie sa date de RDV ? C'est par ici ! </p>
>						<!-- <a href="#main" class="button scrolly"> Découvrir </a> --> 
					</div>
				</section>

        <!DOCTYPE PHP>

<!-- Connexion à la base de données
//Ici connexion a la BD locale
include("connect.php");

//Ici connexion a la BD sur phpetu
//include("connect_phpetu.php"); -->


<h1> Bienvenue sur le site du Cabinet médical CICORELLA - HAMMADOU </h1>

<h2> Prise de rendez-vous </h2> 

Formulaire de prise de rendez-vous
<from action-"ajout-etu.php" method=_POST">
<fieldset>
  <p> Nom du patient : <input type="text" name="nom_pat" size="40"/> </p>
  <p> Prenom du patient : <input type="text" name="prenom_pat" size="40"/> </p>
  <p> Nom du medecin : <input type="text" name="Nom_med" size="40"/> </p>
  <p> Date de rendez-vous : <input type="date" name="Date_consult" size="8" </p>
  <p> Heure du rendez-vous : <input type="date_sunrise" name="H_dbt_consult" size="4" </p>

<p> <input type="submit" name="Valider" value="Valider"/>
    <input type="reset" name="Annuler" value="Annuler"/> </p>
  </fieldset>
</FROM>

 <!-- php?
include("connect.php")

$Nom du patient=$_POST[nom_pat]
$Prenom du patient=$_POST[prenom_pat]
$Nom du medecin=$_POST[Nom_med]
$Date de rendez-vous=$_POST[Date_consult]
$Heure du rendez-vous=$_POST[H_dbt_consult]

$requete= "insert into patient values('$Nom du patient','$Prenom du patient','$Nom du medecin','$Date de rendez-vous','$Heure du rendez-vous')";
$resultat=mysqli_query($bdd, $requete);
If($resultat) echo"<p>Ajout réussi !</p>";
?>


// Exécuter une requête SELECT pour récupérer des données des rendez-vous
$query = "SELECT * FROM consultation";
$result = $mysqli->query($query);

// Afficher les données des rendez-vous récupérées
while ($row = $result->fetch_assoc()) {
    echo "Nom du patient: " . $row["nom_patient"] . "<br>";
    echo "Prénom du patient: " . $row["prenom_patient"] . "<br>";
    echo "Nom du medecin: " .$row["Nom_med"] . "<br>";
    echo "Date du rendez-vous: " . $row["Date_consult"] . "<br>";
    echo "Heure du rendez-vous: " . $row["H_dbt_consult"] . "<br>";
}


// Fermer la connexion à la base de données
$mysqli->close();
?> --> 