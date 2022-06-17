<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<?php
		session_start();
		require("Connexion/Connexion_db.php");

		if (isset($_REQUEST["email"]))
		{
			$email = $_REQUEST["email"];
			$mdp = $_REQUEST["mdp"];
			$id;

			$sql_select = "SELECT * FROM users WHERE email='$email'";
			$login=$connexion->query($sql_select);
			if($login->rowCount()>0)
			{
				
				while($row = $login->fetch(PDO::FETCH_ASSOC)){
        			if (password_verify($mdp, $row["mdp"])) {
        				$id = $row["id"];
            			echo "<br>Connecté avec succès";
            			$_SESSION["id"] = $id;
            			$_SESSION["loggedUser"] = true;
            			echo  $_SESSION["id"];
            			echo $id;
            			header("location:Index.php?id=$id");
        			} else {
            			echo "<br>Utilisateur inexistant";
        			}
			}
		}
	}

		?>


		<form class="login" action="Login.php" method="post">
			<h1>Connexion</h1>
		<div id="log">
			<label for="email">Email</label>
			</br>
			<input type="email" id="email" name="email">
			</br>
			<label for="mdp">Mot de Passe</label>
			</br>
			<input type="password" id="mdp" name="mdp">
			</br>
			<input type="submit" name="submit" value="login" class="login-button">
			<a href="Login_admin.php">Admin</a>
		</div>
</form>


</body>
</html>