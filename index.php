<?php
// Faire appel aux infos présentes dans les autres fichiers
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

    <!-- http://localhost/LENOIR-Maurane/POO_Banque/index.php -->

    <?php

    // Ajouter un titulaire
    echo  "<b>Titulaire : </b>". "<br />"."<br />";
    $titulaire = new Titulaire("Rimbeau","Isabelle", "15-06-1979", "Rennes");

    // Accéder aux informations du titulaire
    echo "Nom : ". $titulaire->getNom(). "<br>". "Prénom : ". $titulaire->getPrenom(). "<br>". "Date de naissance : ". $titulaire->getDateDeNaissance(). "<br>". "Ville : ". $titulaire->getVille(). "<br /><br />";
    // echo "Prénom : ". $titulaire->getPrenom(). "<br>";
    // echo "Date de naissance : ". $titulaire->getDateDeNaissance(). "<br>";
    // echo "Ville : ". $titulaire->getVille(). "<br />"."<br />";

    // Age du titulaire
    $dateDeNaissance = new DateTime('15-06-1979');
    $dateActuelle = new DateTime();
    // $difference = date_diff($dateDeNaissance, $dateActuelle);
    // echo "Age du titulaire : ". $difference->y ." ans". "<br />"."<br />";

    // Ajouter un compte courant
    $compteCourant = new Compte("453695526959", 2500, "EUR", "Compte Courant", $titulaire);
    $titulaire->ajouterCompte($compteCourant);

    // Ajouter un compte Livret A
    $compteLivretA = new Compte("6437179155247", 10693, "EUR", "Livret A", $titulaire);
    $titulaire->ajouterCompte($compteLivretA);


    // Accéder à la liste des comptes
    // echo  "<b>Comptes du titulaire : </b>". "<br />"."<br />";
    // $comptes = $titulaire->getComptes();

    // echo "Nom du compte : ". $compteCourant->getNomCompte(). "<br>";
    // echo "Numéro de compte : ". $compteCourant->getNumero(). "<br>";
    // echo "Solde : ". $compteCourant->getSolde(). " ". $compteCourant->getDevise(). "<br />"."<br />";
    
    // echo "Nom du compte : ". $compteLivretA->getNomCompte(). "<br>";
    // echo "Numéro de compte : ". $compteLivretA->getNumero(). "<br>";
    // echo "Solde : ". $compteLivretA->getSolde(). " ". $compteLivretA->getDevise(). "<br />"."<br />";

    // OPERATIONS :

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
    echo  "<b>Solde avant le virement : </b>". "<br />"."<br />";
    echo "Compte courant : ". $compteCourant->getSolde()
. " ". $compteCourant->getDevise(). "<br>";
    echo "Livret A : ". $compteLivretA->getSolde(). " ". $compteLivretA->getDevise(). "<br />"."<br />";

    $compteCourant->virement($compteLivretA, 1000). "<br />"."<br />";

    echo  "<b>Solde après le virement : </b>". "<br />"."<br />";
    echo "Compte courant : ". $compteCourant->getSolde()
. " ". $compteCourant->getDevise(). "<br>";
    echo "Livret A : ". $compteLivretA->getSolde(). " ". $compteLivretA->getDevise(). "<br>";

    ?>
        
    </body>
</html>