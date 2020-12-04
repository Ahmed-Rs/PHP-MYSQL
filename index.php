<?php

// FORMULAIRES
	

	// On demande avec isset() si on recoit des données de type prenom et nom

	if (isset($_POST['prenom']) && isset($_POST['nom'])) {

		$prenom = htmlspecialchars($_POST['prenom']);
		$nom 	= htmlspecialchars($_POST['nom']);

		echo 'Bonjour '.$prenom.' '.$nom.' !';
		
	}

	echo "<form method='post' action='index.php'>
		
			<p>
				<table>
					<tr>
						<td>Prénom</td>
						<td><input type='text' name='prenom' /></td>
					</tr>
					<tr>
						<td>Nom</td>
						<td><input type='text' name='nom' /></td>
					</tr>
				</table>
				<button type='submit'>Envoyer</button>
			</p>

		</form>";








































