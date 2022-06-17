<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Register</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="login-body">



	<div class="main-container-login">
	<?php
	require('Connexion/Connexion_db.php');

	if(isset($_REQUEST['username']))
	{
		$username = $_REQUEST['username'];
		$email = $_REQUEST['email'];
		$mdp = $_REQUEST['mdp'];
		$mdp = password_hash($mdp, PASSWORD_DEFAULT);
		$size_of_all_docs = 0;

		$sql_select = "SELECT * FROM users WHERE username=?";
		$stmt_select = $connexion->prepare($sql_select);
		$stmt_select->execute([$username]);
		$user = $stmt_select->fetch();
		if($user)
		{
			echo "<p class='msg'>Utilisateur existant!</p>";
		}
		else
		{
			try {
				$sql = "INSERT INTO users (username, email, mdp, size_of_all_docs) VALUES (?,?,?,?)";
				$stmt = $connexion->prepare($sql);
				$stmt->execute([$username, $email, $mdp, $size_of_all_docs]);
			}catch(PDOexception $e){
				echo $sql . "</br>" . $e->getMessage();
			}
			if($stmt)
			{
				echo "<p class='msg'>Compte créé</br><a href='Login.php'>Connectez vous</a></p>";
			}
		}
	}
	?>
		<form class="login" id="login-form" action="Register.php" method="post">
			<img src="assets/" alt="">
			<h1>Créer votre compte</h1>
			<div id="log">
				<div>
					<label for="username">username</label>
					<input type="username" id="username" name="username">
				</div>
				<div>
					<label for="email">Email</label>
					<input type="email" id="email" name="email">
				</div>
				<div>
					<label for="mdp">Mot de Passe</label>
					<input type="password" id="mdp" name="mdp">
				</div>
				<button type="submit" name="submit">Créer maintenant</button>
			</div>
			<div id="already-account">
			<p class="login-directly">Déjà membre ? </p>
			<a href="Login.php">Connectez vous</a>
		</div>
		</form>
	</div>

</body>

</html>