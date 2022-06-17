<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<?php
		session_start();
		require("Connexion/Connexion_db.php");

		if (isset($_REQUEST["email_admin"]))
		{
			$email_admin = $_REQUEST["email_admin"];
			$mdp_admin = $_REQUEST["mdp_admin"];
			$id;

			$sql_select = "SELECT * FROM admin WHERE email='$email_admin'";
			$login_admin=$connexion->query($sql_select);
			if($login_admin->rowCount()>0)
			{
				
				while($row = $login_admin->fetch(PDO::FETCH_ASSOC)){
        			if (password_verify($mdp_admin, $row["mdp"])) {
        				$id = $row["id"];
            			echo "<br>Connecté avec succès";
            			$_SESSION["id"] = $id;
            			$_SESSION["loggedAdmin"] = true;
            			header("location:Admin.php?id=$id");
        			} else {
            			echo "<br>Utilisateur inexistant";
        			}
			}
		}
	}

		?>


		<form class="login" action="Login_admin.php" method="post">
			<h1>Connexion</h1>
		<div id="log">
			<label for="email_admin">Email admin</label>
			</br>
			<input type="email" id="email_admin" name="email_admin">
			</br>
			<label for="mdp_admin">Mot de Passe</label>
			</br>
			<input type="password" id="mdp_admin" name="mdp_admin">
			</br>
			<input type="submit" name="submit" value="login" class="login-button">
			<a href="Login.php">Utilisateur</a>
		</div>
</form>


</body>
</html>