<?php

class Personnage {

    // ATTRIBUTS
    private $_force            = 40;
    private $_classe           = "Plombier";
    private $_couleurCasquette = "Rouge";
    private $_vie              = 100;
    private $_nom              = "Unknown";

    // CONSTRUCTEUR // SI ON NE MET PÄS D'ARG DANS LA FCT, LE NAV AFFICHERA LES VALEURS PAR DEFAUT.
    public function __construct($nom, $force, $couleur) {
        $this->_nom = $nom;
        $this->setForce($force);
        $this->setCouleurCasquette($couleur);
    }


    // METHODE   // get pour recevcoir et set pour modifier
    public function getForce() {
        return $this->_force;

    }

    public function setForce($force) {
        $this->_force = $force;

    }

    public function getCouleurCasquette() {
        return $this->_couleurCasquette;
    }

    public function setCouleurCasquette($couleur) {
        $this->_couleurCasquette = $couleur; 
        
    }

    public function getClasse() {
        return $this->_classe;
        
    }
 
    public function getInfo() {
        return "<p>".$this->_nom." est de classe ".$this->_classe.", a une force de ".$this->_force." points et est de couleur ".$this->_couleurCasquette.".</p>";
    }

    public function frapper(Personnage $personnage) {
        return $personnage->recevoirDegats($this->_force);
    }

    public function recevoirDegats($force) {
        $this->_vie = $this->_vie - $force;
        
        if ($this->_vie <= 0) {

            echo "<p>".$this->_nom." a perdu ".$force." points de vie. Il vient de succomber à ses blessures.</p>";
        
        } else {

            echo "<p>".$this->_nom." a perdu ".$force." points de vie. Il lui reste ".$this->_vie." points.</p>";
        
        }
    }

}

$mario = new Personnage("Mario", 45, "rouge"); // ON MET EN ARGUMENTS CE QU'ON A DECLARE DANS LA FCT CONSTRUCTOR PLUS HAUT
$luigi = new Personnage("Luigi", 40, "vert");

echo $mario->getInfo();
echo $luigi->getInfo();

$mario->frapper($luigi);
$luigi->frapper($mario);
$mario->frapper($luigi);
$luigi->frapper($mario);
$mario->frapper($luigi);
