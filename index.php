<?php

// RECEIVED SHORTCUT
if (isset($_GET['q'])) {

	// VARIABLE
	$shortcut = htmlspecialchars($_GET['q']);

	// VERIFIER SI C'EST UN RACCOURCI
	$bdd = new PDO('mysql:host=localhost;dbname=bitly;port=3308;charset=utf8', 'root', '');

	$req = $bdd->prepare('SELECT COUNT(*) AS x
						  FROM links
						  WHERE shortcut = ?');

	$req->execute(array($shortcut));

	while ($result = $req->fetch()) {
		if ($result['x'] != 1) {
			header('location: ../?error=true&&message=Adresse url non connue');
			exit();
		}
	}

	// REDIRECTION
	$req = $bdd->prepare('SELECT *
						  FROM links
						  WHERE shortcut = ?');

	$req->execute(array($shortcut));

	while ($result = $req->fetch()) {

			header('location: '.$result['url']);
			exit();

	}
}


// SENT FORM
if (isset($_POST['url'])) {
	
	$url = $_POST['url'];

	// VERIFICATION DE LA VALIDITE DE L'URL
	if (!filter_var($url, FILTER_VALIDATE_URL)) {
		//PAS UN LIEN
		header('location: ../?error=true&message=Adresse url non valide');
		exit();
	}

	// SHORTCUT
	$shortcut = crypt($url, rand());

	// HAS BEEN ALREADY SENT
	$bdd = new PDO('mysql:host=localhost;dbname=bitly;port=3308;charset=utf8','root','');

	$req = $bdd->prepare('SELECT COUNT(*) AS x
						  FROM links
						  WHERE url = ?');

	$req->execute(array($url));

	while ($result = $req->fetch()) {
		if ($result['x'] != 0) {
			header('location: ../?error=true&message=Adresse déjà raccourcie');
			exit();
		}
	}

	// SENDING
	$req = $bdd->prepare('INSERT INTO links(url, shortcut)
					 VALUES(?, ?)');

	$req->execute(array($url, $shortcut));

	header('location: ../?short='.$shortcut);
	exit();
}




?>

<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="utf-8">
		<title>Raccourcisseur d'Url</title>
		<link rel="stylesheet" type="text/css" href="des/def.css">
		<link rel="icon" type="image/png" href="pictures/favico.png">
	
	</head>

	<body>

		<section id="hello">
			<div class="container">

				<header id="monHeader">

					<img src="pictures/logo.png" alt="logo" id="logo">

				</header>

				<h1>Une url longue ? Raccourcissez-là</h1>

				<h2>Largement meilleur et plus court que les autres.</h2>

				<form method="post" action="index.php">
					<input type="url" name="url" placeholder="Veuillez entrer votre url">
					<input type="submit" value="Raccourcir">
				</form>

				<?php
					if (isset($_GET['error']) && isset($_GET['message'])) //Si le lien renvoie une erreur et un message
				{ ?>

					<div class="center">
						<div id="result">
							<b><?php echo htmlspecialchars($_GET['message']); ?></b> <!-- On affiche le message visible sur le lien -->
						</div>
					</div>

				<?php } else if (isset($_GET['short'])) { ?> <!-- Si le lien renvoie un short -->

						<div class="center">
							<div id="result">
								<b><?php echo 'URL RACCOURCIE : http://localhost/?q='.htmlspecialchars($_GET['short']); ?></b> <!-- On affiche le message visible sur le lien -->
							</div>
						</div>

				<?php } ?>


			</div>
		</section>

		<section id="brands">
			<div class="container">
				<h3>Ces marques nous font confiance</h3>
				<img src="pictures/1.png" alt="1" class="picture">
				<img src="pictures/2.png" alt="2" class="picture">
				<img src="pictures/3.png" alt="3" class="picture">
				<img src="pictures/4.png" alt="4" class="picture">
			</div>
		</section>

		<footer>

			<img src="pictures/logo2.png" alt="logo2" id="logo2"><br >
			2018 © Bitly<br>
			<a href="#">Contact</a> - <a href="#">À propos</a>

		</footer>

	</body>

</html>