<?php
// On veut créer un titulaire avec les infos suivantes 
// Nom, Prénom, Date de Naissance, Ville, et ces comptes (compte courant, Livret A)
// On créé une classe Titulaire

class Titulaire {

    //definition 
    //typage string int bool ...
    private string $nom;
    private string $prenom;
    private DateTime $dateDeNaissance;
    private string $ville;
    // Tableau vide qui contiendra le(s) compte(s)
    private array $comptes;

    // Constructeur
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

    // AFFICHER LES INFORMATIONS

    // ajouter compte
    public function ajouterCompte(Compte $compte) {
        $this->comptes[] = $compte;
    }

    //function afficher les comptes du titulaire
    public function afficherComptesTitulaire() {
        echo "<b>Les comptes de ". $this->nom. " ". $this->prenom.  " sont : </b><br>";

        foreach ($this->comptes as $compte) {
            echo $compte. "<br>";
        }
    }

    // faire une function calculer age
    public function calculerAge() {
        $dateActuelle = new DateTime();
        $dateDeNaissance = $this->dateDeNaissance;
        $difference = date_diff($dateDeNaissance, $dateActuelle);
        return $difference->y;
    }

    //function __toString et a quoi elle sert
    public function __toString() {
        return "Aujourd'hui". $this->getNom(). " ". $this->getPrenom(). " ". $this->calculerAge(). " ". $this->getVille(). "<br><br>";
    }
}

?>