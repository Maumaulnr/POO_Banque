<?php
// On veut créer un titulaire avec les infos suivantes 
// Nom, Prénom, Date de Naissance, Ville, et ces comptes (compte courant, Livret A)
// On créé une classe Titulaire

class Titulaire {

    //definition 
    //typoage strinf int bool ...
    private string $nom;
    private string $prenom;
    private DateTime $dateDeNaissance;
    private string $ville;
    private array $comptes;

    //typage
    public function __construct(string $nom, string $prenom, string $dateDeNaissance, string $ville) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateDeNaissance = new DateTime($dateDeNaissance);
        $this->ville = $ville;
        $this->comptes = [];
    }

    // a quoi sert le getter et setter?
    // getter sert à récupérer un attribut spécifique et setter sert à mettre à jour l'information sur l'attribut donc si la valeur initiale est 0, si on veut lui donner une nouvelle valeur, on utilisera set

    // Nom du titulaire
    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    // Prénom du titulaire
    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    // DDN du titulaire
    public function getDateDeNaissance() {
        return $this->dateDeNaissance->format('d-m-Y');
    }

    public function setDateDeNaissance($dateDeNaissance) {
        $this->dateDeNaissance = $dateDeNaissance->format('d-m-Y');
        return $this;
    }

    // Ville
    public function getVille() {
        return $this->ville;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    // Comptes du titulaire
    public function getComptes() {
        return $this->comptes;
    }

    public function setComptes($comptes) {
        $this->comptes = $comptes;
    }

    // ajouter compte
    public function ajouterCompte(Compte $compte) {
        $this->comptes[] = $compte;
    }

    //function afficher les comptes du titulaire
    public function afficherComptesTitulaire() {
        echo "Les comptes du titulaires sont : ". $this. "<br>";
    }


    // faire une function calculer age
    public function calculerAge() {
        $difference = date_diff($dateDeNaissance, $dateActuelle);
        echo "Age du titulaire : ". $difference->y ." ans". "<br />"."<br />";
    }

    //function __toString et a quoi elle sert
    public function __toString() {
        return $this->getNom(). " ". $this->getPrenom(). " ". $this->getDateDeNaissance(). " ". $this->getVille. "<br><br>";
    }
}

?>