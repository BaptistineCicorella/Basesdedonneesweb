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