<?php

// LIRE / ECRIRE DANS UN FICHIER

// MODE
// r - Lire le fichier
// r + - Lire et écrire dans un fichier
// a - Lire le fichier et le créer s'il n'existe pas
// a + - Lire et écrire dans un fichier et le créer s'il n'existe pas et écrire à la suite du fichier 

// OUVRIR
$fichier = fopen('utilisateur.txt', 'r+'); // Lr r+, contrairement au a+, remplace le texte déjà existant au lieu de s'ajouter à lui

// ECRIRE
// fputs($fichier, 'Non');

// LIRE
// fgets();  - lit une ligne
// fgetc();  - lit un caractère

$ligne = fgets($fichier);

echo $ligne;

// FERMER
fclose($fichier);