<?php 

	if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
		
		// Cette variable sera réécrite ci-dessous si l'opération est un succès
		$error = 1;

		if ($_FILES['image']['size'] <= 3000000) {
			
			$informationsImage 	  = pathinfo($_FILES['image']['name']);

			$extensionImage   	  = $informationsImage['extension'];

			$extensionsAutorisees = array('png', 'gif', 'jpg', 'jpeg');

			if (in_array($extensionImage, $extensionsAutorisees)) {

				$adress = 'uploads/'.time().rand().'.'.$extensionImage;
				
				move_uploaded_file($_FILES['image']['tmp_name'], $adress);

				$error = 0;


			}

		}

	}

?>






<!DOCTYPE html>

<html>

	<head>

		<meta charset="utf-8">
		<title>Hébergeur d'images gratuit</title>


	</head>

	<style type="text/css">
		html, body { margin: 0; font-family: georgia; }
		header { text-align: center; color: white; background-color: red }
		article { margin-top: 50px; background-color: #f7f7f7; padding: 10px; }
		button { margin-top: 10px; }
		h1 { margin-top: 0; text-align: center; }
		#presentation-picture { text-align: center; }
		#image { max-width: 300px; }
		.container { width: 500px; margin: auto;}
		
	</style>

	<body>

		<header>
			<h2>PHOTOSHOOT</h2>
		</header>


		<div class="container">
			<article>

				<h1>Hébergez une image</h1>

				<?php

					if (isset($error) && $error == 0) {
						echo '<div id="presentation-picture"><img src="'.$adress.'" id="image"><br />

						<a href="http://localhost/'.$adress.'" target="_blank">Votre image</a></div>';
					} elseif (isset($error) && $error == 1) {
						
						echo 'Votre image ne peut pas être envoyée. Vérifiez son extension et sa taille (max: 3Mo).';

					}

				?>


				<form method="post" action="/index.php" enctype="multipart/form-data">
					<p>
						<h1>Formulaire</h1>
						<input type="file" required name="image"><br />
						<div style="text-align: center;">
							<button type="submit">Héberger</button>
						</div>
					</p>
				</form>


				

			</article>
		</div>


	</body>
</html>




















