	<!DOCTYPE html>
	<html>

		<head>
			<meta charset='utf-8'>
			<title>Test</title>
		</head>

		<body>

			<?php require_once("src/header.php")  ?>
			<?php require_once("src/header.php")  ?> <!-- On utilise requie() au lieu de include lorsqu'on veut que toute la page ne s'affiche plus lorsqu'on ne trouve pas un fichier donné. -->
			<!-- Le _once indique que le fichier ne doit être ajoutée qu'une seule fois dans notre code. -->

			<section style="border: 1px solid pink; padding: 30px;">
				Hello
			</section>

			<footer style="border: 1px solid pink; padding: 30px;">
				Le pied de page
			</footer>



		</body>
	</html>




