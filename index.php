<?php

	// ENVOI FICHIER PHP

	// inupt de type file car on veut envoyer un fichier.

	// $_FILES['image'] // On utilise $_FILES pour dire à notre server qu'il doit réceptionner un fichier. 'image'fait référence à notre fichier image ci-dessous. 

	// $_FILES['image']['name'] // Avec l'option 'name' on isole le nom du fichier. On peut même le stocker dans une variable.

	// $_FILES['image']['type'] // Avec l'option 'type', on a par exemple le type png, pdf ...

	// $_FILES['image']['size'] // Taille

	// $_FILES['image']['tmp_name'] // Cette option renvoie le nom de l'emplacement temporaire où se situe le fichier dans le serveur.

	// $_FILES['image']['error'] // Si oui ou non notre image a bien été reçue par notre serveur. Si oui, on peut utiliser des traitements sur notre image.


if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {	// Si le fichier existe et qu'il n'y a pas d'erreur(image reçue par notre serveur)
	
	if ($_FILES['image']['size'] <= 3000000) {	// On vérifie la taille
		
		$informationsImage = pathinfo($_FILES['image']['name']); // Capter toutes les infos du fichier dans un tableau

		$extensionImage = $informationsImage['extension']; // On récupère l'extension du fichier

		$extensionsArray = array('png', 'gif', 'jpg', 'jpeg'); // On compare cette extension avec des extensions qu'on aura préalablement autorisées dans un tableau créé à cet effet

		if (in_array($extensionImage, $extensionsArray)) {
			// On peut enfin envoyer l'image définitivement sur notre serveur

			// On envoie le fichier de l'emplacement provisoire vers l'emplacement définitif, en lui générant un nouveau nom unique.
			// move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.time().basename($_FILES['image']['name']));
			// echo 'Envoi réussi !';
			
			// Le mieux c'est de concaténer avec une fct. rand()
			move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.time().rand().rand().'.'.$extensionImage);
			echo 'Envoi réussi !';

		}

	}

}





echo '<form method="post" action="index.php" enctype="multipart/form-data"> 
		<p>
			<h1>Formulaire</h1>
			<input type="file" name="image" /><br />
			<button type="submit">Envoyer</button>
		</p>
	</form>';
































