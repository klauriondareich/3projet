<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Register</title>

</head>

<body>

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
			echo "Utilisateur existant!";
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
				echo "<h3>Compte créé<h3></br><a href='Login.php'>Connectez vous</a>";
			}
		}
	}
	?>



	<form class="register" action="Register.php" method="post">
		<h1 class="register-title">Créez votre compte</h1>

		<div id="div-register">
			<label for="username">Nom d'utilisateur</label>
			</br>
			<input type="text" id="username" name="username">
			</br>
			<label for="email">Email</label>
			</br>
			<input type="email" id="email" name="email">
			</br>
			<label for="mdp">Mot de passe</label>
			</br>
			<input type="password" id="mdp" name="mdp">
			</br>
			<input type="submit" name="submit" value="Enregistrer" class="register-button">
		</div>

		<div id="already-account">
			<p class="login-directly">Déjà membre ? </p>
			<a href="Login.php">Connectez vous</a>
		</div>
	</form>

</body>

</html>