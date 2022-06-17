<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-body">
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

		<div class="main-container-login">
			<form class="login" id="login-form" action="Login_admin.php" method="post">
				<img src="assets/" alt="">
				<h1>Connexion/admin</h1>
				<div id="log">
					<div>
						<label for="email">Email admin</label>
						<input type="email" id="email_admin" name="email_admin">
					</div>
					<div>
						<label for="mdp">Mot de Passe</label>
						<input type="password" id="mdp_admin" name="mdp_admin">
					</div>
					<button type="submit" name="submit">Se connecter</button>
					<!-- <input type="submit" name="submit" value="login" class="login-button"> -->
					<a href="Login.php">Utilisateur</a>
				</div>
			</form>
		</div>
</form>


</body>
</html>