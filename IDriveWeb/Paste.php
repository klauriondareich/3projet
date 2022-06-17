<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>User Home</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="admin-body">
	<div class="home-item">
		
		<?php include("shared/userHeader.php")?> 

		<?php

		$session_id = $_GET["id"];
		$file = $_GET["file"];

		?>


		<?php
		if(isset($_REQUEST['destination']))
		{
			$source = "C:/xampp/htdocs/3proj/IDriveMobile/public/uploads/$file";
			$destination = $_POST["destination"];

			if(copy($source, "$destination/$file"))
			{
				echo "Fichier copié avec succès!";
			}
		}
		?>


		<form class="form-state" method="post" action="Paste.php?id=<?php echo $session_id?>&file=<?php echo $file?>">
			Destination : <input type="text" name="destination">
			<button type="submit">Envoyer</button>
		</form>
		<a href="Index.php?id=<?php echo $session_id?>">Retour à l'accueil</a>
	</div>
</body>
</html>
