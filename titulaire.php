// On veut créer un titulaire avec les infos suivantes 
// Nom, Prénom, Date de Naissance, Ville, et ces comptes (compte courant, Livret A)
// On créé une classe Titulaire

<?php

class Titulaire {
    private $nom;
    private $prenom;
    private $dateDeNaissance;
    private $ville;
    private $comptes;

    public function __construct($nom, $prenom, $dateDeNaissance, $ville) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateDeNaissance = $dateDeNaissance;
        $this->ville = $ville;
        $this->comptes = [];
    }

    // 
    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getDateDeNaissance() {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance($dateDeNaissance) {
        $this->dateDeNaissance = $dateDeNaissance;
    }

    public function getVille() {
        return $this->ville;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function getComptes() {
        return $this->comptes;
    }

    public function ajouterCompte($compte) {
        $this->comptes[] = $compte;
    }
}

?>