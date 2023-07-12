<?php

// On veut créer des comptes avec les infos suivantes : 
// Numéro de compte, solde du compte, préciser la devise monétaire (EUR), et le nom du compte (compte courant, livret A, ...)

class Compte {
    private $numero;
    private $solde;
    private $devise;
    private $nomCompte;


    public function __construct($numero, $solde, $devise, $nomCompte) {
        $this->numero = $numero;
        $this->solde = $solde;
        $this->devise = $devise;
        $this->nomCompte = $nomCompte;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getSolde() {
        return $this->solde;
    }

    public function setSolde($solde) {
        $this->solde = $solde;
    }

    public function getDevise() {
        return $this->devise;
    }

    public function setDevise($devise) {
        $this->devise = $devise;
    }

    public function getNomCompte() {
        return $this->nomCompte;
    }

    public function setNomCompte($nomCompte) {
        $this->nomCompte = $nomCompte;
    }

    public function crediter($montant) {
        $this->solde += $montant;
    }

    public function debiter($montant) {
        $this->solde -= $montant;
    }

    public function virement(Compte $destinataire, $montant) {
        $this->debiter($montant);
        $destinataire->crediter($montant);
    }

}

?>