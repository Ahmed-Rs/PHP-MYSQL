<?php

class Personnage {

    // ATTRIBUTS
    private $_force            = 40;
    private $_classe           = "Plombier";
    private $_couleurCasquette = "Rouge";

    // CONSTRUCTEUR // SI ON NE MET PÄS D'ARG DANS LA FCT, LE NAV AFFICHERA LES VALEURS PAR DEFAUT.
    public function __construct($force) {
        $this->setForce($force);
    }


    // METHODE   // get pour recevcoir et set pour modifier
    public function getForce() {
        return $this->_force;

    }

    public function setForce($force) {
        $this->_force = $force;

    }

    public function getCouleurClasse() {
        return $this->_couleurCasquette;
    }

    public function setCouleurClasse($couleur) {
        $this->_couleurCasquette = $couleur; 
        
    }

    public function getClasse() {
        return $this->_classe;
        
    }

    public function getInfo() {
        return "Ce personnage est de classe ".$this->_classe.", a une force de ".$this->_force." points et est de couleur ".$this->_couleurCasquette.".";
    }

}

$mario = new Personnage(70); // ON MET EN ARGUMENTS CE QU'ON A DECLARE DANS LA FCT CONSTRUCTOR PLUS HAUT

echo $mario->getForce()."\n"; 

$mario->setForce(10);

echo $mario->getForce()."\n";

echo $mario->getClasse()."\n";

echo $mario->getInfo();
