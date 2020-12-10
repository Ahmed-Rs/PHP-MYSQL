
<?php

// LES COOKIES ET LES SESSIONS
session_start(); // On utilise toujours le session_start() au tout début du code. Avant le php et le html.
// session_destroy(); // On enlève les sessions

// On peut modifier un Cookie via le navigateur, l'utilisateur y a accès d'administration, mais la Session ne peut pas être modifiée, sauf par le développeur, via du php. Les cookies sont valables jusqu'à leur date d'expiration contrairement aux Sessions qui expirent dès lors qu'on ferme le navigateur.

	if (!empty($_POST['pseudo'])) { // !empty() vérifie que le champs n'est pas vide et induit une vérification de l'existence également donc induit 										   l'utilisation du isset()
		$pseudo = $_POST['pseudo'];

		// setcookie('pseudo', $pseudo, time() + 365*24*3600, true);// On crée toujours le cookie avant le DOCTYPE html, on utilise le true pour activer le http only et éviter les failles xss.

		$_SESSION['pseudo'] = $pseudo;

	}



?>


<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>PHP</title>
		</head>
		<body>

			<h1>Entrez votre pseudo</h1>

			<form method="post" action="index.php">
				<table>
					<tr>
						<td>Pseudo</td>
						<td><input type="text" name="pseudo"></td>
					</tr>
				</table>
				<td><button type="submit">Se connecter</button></td>
			</form>

			<?php
				if (!empty($_SESSION)) { // Avant $_SESSION on avait $_COOKIE  pour le cours sur les cookies.
					echo '<h2>Bienvenue '.htmlspecialchars($_SESSION['pseudo']).'</h2>'; // On utilise le htmlspecialchars() pour la sécurité.
				}


			?>


		</body>
	</html>


