<?php

// LIRE / ECRIRE DANS UN FICHIER

// MODE
// r - Lire le fichier
// r + - Lire et écrire dans un fichier
// a - Lire le fichier et le créer s'il n'existe pas
// a + - Lire et écrire dans un fichier et le créer s'il n'existe pas et écrire à la suite du fichier 

// COMPTEUR DE VISITE
// compteur.txt
// 0;
// Incrémenter cette valeur à chaque fois qu'un utilisateur visite notre et lui afficher son numéro de visiteur
// Vous êtes la x-ème visite sur ce site

// OUVRIR
$fichier = fopen('compteur.txt', 'r+');

// LIRE
$pages = fgets($fichier);

// CURSEUR A METTRE A GAUCHE, AU DEBUT DU TEXTE, SINON IL ECRIRA A LA SUITE DU CHIFFRE DEJA PRESENT. Le cuseur a en effet été déplacé vers la fin de la ligne en LISANT (fgets) avant d'ECRIRE (fputs)
// Dans la version précédente , ce n'était pas le cas car on ECRIVAIT avant de LIRE.
// Le fait de LIRE avant d'ECRIRE a donc le même effet que le a+
fseek($fichier, 0); // On place le curseur à l'index 0 des chars dans notre fichier

$pages += 1;

// ECRIRE
fputs($fichier, $pages);

// FERMER
fclose($fichier);

echo 'Bonjour, vous le '.$pages.' ème visiteur du site !';





// fclose($fichier);