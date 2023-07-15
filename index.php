<?php
// Faire appel aux classes Compte et Titulaire
require 'Compte.php';
require 'Titulaire.php';

?>

<!-- On veut afficher toutes les informations que l'on pourra collecter grâce aux classes -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Banque</title>
    </head>
    <body>
        <h1>Banque</h1>

    <!-- http://localhost/LENOIR-Maurane/POO_Banque/index.php -->

    <?php

    // Ajouter un titulaire
    echo  "<b>Titulaire : </b>". "<br />"."<br />";
    $titulaire = new Titulaire("Rimbeau","Isabelle", "15-06-1979", "Rennes");

    // Accéder aux informations du titulaire
    echo "Nom : ". $titulaire->getNom(). "<br>". "Prénom : ". $titulaire->getPrenom(). "<br>". "Date de naissance : ". $titulaire->getDateDeNaissance(). "<br>". "Ville : ". $titulaire->getVille(). "<br /><br />";
   
    ?>
    <h2>Listes des comptes</h2>
    <?php

    // Ajouter un compte courant
    $compteCourant = new Compte("4536955269591", 2500, "EUR", "Compte Courant", $titulaire);

    // Ajouter un compte Livret A
    $compteLivretA = new Compte("6437179155247", 10693, "EUR", "Livret A", $titulaire);

    // Accéder à la liste des comptes
    $titulaire->afficherComptesTitulaire();
    echo "<br>";

    ?>
    <h2>Opérations</h2>
    <?php

    // Dépôt
    echo  "<b>Dépôt : </b>". "<br />"."<br />";
    echo "Numéro de compte : ". $compteLivretA->getNumero(). "<br>";
    $compteCourant->crediter(50);
    echo "Nouveau solde après dépôt: ". $compteCourant->getSolde()
. " ".$compteLivretA->getDevise(). "<br />"."<br />";

    // Retrait
    echo  "<b>Retrait : </b>". "<br />"."<br />";
    echo "Numéro de compte : ". $compteLivretA->getNumero(). "<br>";
    $compteCourant->debiter(15);
    echo "Nouveau solde après dépôt: ". $compteCourant->getSolde()
    . " ".$compteLivretA->getDevise(). "<br />"."<br />";

    // Virement
        // Solde avant virement : 
    echo  "<b>Solde avant le virement : </b>". "<br />"."<br />";
    echo "Compte courant : ". $compteCourant->getSolde()
. " ". $compteCourant->getDevise(). "<br>";
    echo "Livret A : ". $compteLivretA->getSolde(). " ". $compteLivretA->getDevise(). "<br />"."<br />";

    // Virement de 1000 €
    $compteCourant->virement($compteLivretA, 1000). "<br />"."<br />";

    // Solde APRES virement : 
    echo  "<b>Solde après le virement : </b>". "<br />"."<br />";
    echo "Compte courant : ". $compteCourant->getSolde()
. " ". $compteCourant->getDevise(). "<br>";
    echo "Livret A : ". $compteLivretA->getSolde(). " ". $compteLivretA->getDevise(). "<br>";

    ?>
        
    </body>
</html>