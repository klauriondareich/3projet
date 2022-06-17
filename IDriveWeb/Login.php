<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-body">
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
        				if($row["blocked"]==1){header("location:Blocked.php");}
        					else{
        				$id = $row["id"];
            			echo "<br>Connecté avec succès";
            			$_SESSION["id"] = $id;
            			$_SESSION["loggedUser"] = true;
            			echo  $_SESSION["id"];
            			echo $id;
            			header("location:Index.php?id=$id");}
        			} else {
            			echo "<br>Utilisateur inexistant";
        			}
			}
		}
	}

		?>


		<div class="main-container-login">
			<form class="login" id="login-form" action="Login.php" method="post">
				<img src="assets/" alt="">
				<h1>Connexion/Utilisateur</h1>
				<div id="log">
					<div>
						<label for="email">Email</label>
						<input type="email" id="email" name="email">
					</div>
					<div>
						<label for="mdp">Mot de Passe</label>
						<input type="password" id="mdp" name="mdp">
					</div>
					<button type="submit" name="submit">Se connecter</button>
					<!-- <input type="submit" name="submit" value="login" class="login-button"> -->
					<a href="Login_admin.php">Admin</a>
				</div>
			</form>
		</div>


</body>
</html>
