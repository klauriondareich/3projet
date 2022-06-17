<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Home</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="admin-body">
	<?php
	require("Connexion/Connexion_db.php");
	$session_id = $_GET['id'];
	?>

<div class="home-item">

	<?php

		if(isset($_POST["logout"])){

			session_destroy();
			header("Location: Login_admin.php");
			exit(); 
		}
		
	?> 
	<div class="admin-item">
		<h1>Administration IDrive 
		<form action="" method="post">
			<button class="logout-btn" type="submit" name="logout">
				Se déconnecter
			</button>
        </form>
	</div>

	<table class="table-view">
		<tr>
			<th>ID</th>
			<th>Utilisateur</th>
			<th>Email</th>
			<th>Espace utilisé</th>
			<th>Status du compte</th>
			<th>Impersonate</th>
		</tr>
		<?php
	$sql_select = "SELECT * FROM users";
	$users=$connexion->query($sql_select);

	if($users->rowCount()>0)
	{
		while($row = $users->fetch(PDO::FETCH_ASSOC)){
			$user_id = $row["id"];
			$nom = $row["username"];
			$email = $row["email"];
			$size_all = $row["size_of_all_docs"];
			$blocked = $row["blocked"];
			echo "
       		 <tr>
				<td>$user_id</td>
				<td>$nom</td>
				<td>$email</td>
				<td>$size_all</td>
				<td>$blocked</td>
				<td><a href='Home.php?id=$user_id' target='_blank'>Impersonate User</a></td>
        	</tr>";
		}
	}
	?>
	</table>
	
	</div>
	
</body>
</html>