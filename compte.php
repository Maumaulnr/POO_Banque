<?php

// On veut créer des comptes avec les infos suivantes : 
// Numéro de compte, solde du compte, préciser la devise monétaire (EUR), et le nom du compte (compte courant, livret A, ...)

class Compte {

    //
    private int $numero;
    private float $solde;
    private string $devise;
    private string $nomCompte;
    //lier le compte avec le titulaire
    private Titulaire $titulaire;


    // constructeur
    public function __construct(int $numero, float $solde, string $devise, string $nomCompte, Titulaire $titulaire) {
        $this->numero = $numero;
        $this->solde = $solde;
        $this->devise = $devise;
        $this->nomCompte = $nomCompte;
        $this->titulaire = $titulaire;

        //recuperer la methode du titulaire
        $titulaire->ajouterCompte($this);
    }

    // Numéro de compte
    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
        return $this;
    }

    // Solde du compte
    public function getSolde() {
        return $this->solde;
    }

    public function setSolde($solde) {
        $this->solde = $solde;
        return $this;
    }

    // Devise monétaire
    public function getDevise() {
        return $this->devise;
    }

    public function setDevise($devise) {
        $this->devise = $devise;
        return $this;
    }

    // Nom du compte (libellé)
    public function getNomCompte() {
        return $this->nomCompte;
    }

    public function setNomCompte($nomCompte) {
        $this->nomCompte = $nomCompte;
        return $this;
    }

    // Titulaire
    public function getTitulaire() {
        return $this->titulaire;
    }

    public function setTitulaire($titulaire) {
        $this->titulaire = $titulaire;
        return $this;
    }

    // On crédite le compte (+)
    public function crediter($montant) {
        $this->solde += $montant;
    }

    // On débite le compte (-)
    public function debiter($montant) {
        $this->solde -= $montant;
    }

    // On fait un virement (<=>)
    public function virement(Compte $destinataire, $montant) {
        $this->debiter($montant);
        $destinataire->crediter($montant);
    }

    // __toString
    // Retourne toutes les infos du compte
    public function __toString() : string {
        return $this->getNumero();
    }
}

?>