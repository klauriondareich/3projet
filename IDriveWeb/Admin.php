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
	session_start();
	require("Connexion/Connexion_db.php");
	$session_id = $_GET['id'];

	if($_SESSION["loggedAdmin"] != true){
		header("Location: Login_admin.php");
	}
	?>

	<?php
	$sql1 = "SELECT COUNT(id) AS count FROM users";
	$count=$connexion->query($sql1);

	while($row = $count->fetch(PDO::FETCH_ASSOC)){
		$nb_users = $row["count"];
	}

	$nb = 1;
	while($nb <= $nb_users)
	{
	$sql = "SELECT SUM(size) AS ouais FROM docs WHERE user_id='$nb'";
	$docs=$connexion->query($sql);
	
	if($docs->rowCount()>0)
	{
		while($row = $docs->fetch(PDO::FETCH_ASSOC)){
			$totalsize = $row["ouais"];
			$sql_command = "UPDATE users SET size_of_all_docs='$totalsize' WHERE id='$nb'";
			$command_exec=$connexion->query($sql_command);
		}
	}
	$nb = $nb + 1;
}
	?>

<div class="home-item">

		<?php
	 include("shared/adminHeader.php")?> 

	<?php

		if (isset($_REQUEST["id"]))
		{
			$id = $_REQUEST["id"];

			$sql_update1 = "UPDATE users SET blocked=1 WHERE id=$id";
			$update1=$connexion->query($sql_update1);
		}

	

		?>
		<form class="form-state" action="Admin.php?id=<?php echo $session_id?>" method="post">
			<h2>Bloquer un utilisateur</h2>
			<label for="id">Id de l'utilisateur</label>
			<input type="int" id="id" name="id">
			<button type="submit" name="submit" class="state-btn">Bloquer</button>	
		</form>

	<?php

		if (isset($_REQUEST["id_unblock"]))
		{
			$id = $_REQUEST["id_unblock"];

			$sql_update2 = "UPDATE users SET blocked=0 WHERE id=$id";
			$update2=$connexion->query($sql_update2);
		}
	

		?>
		
	<form class="form-state" action="Admin.php?id=<?php echo $session_id?>" method="post">
			<h2>Débloquer un utilisateur</h2>
			<label for="id_unblock">Id de l'utilisateur</label>
			<input type="int" id="id_unblock" name="id_unblock">
			<button type="submit" name="submit" class="state-btn">DéBloquer</button>
	</form>
	

	<table class="table-view">
		<tr>
			<th>ID</th>
			<th>Utilisateur</th>
			<th>Email</th>
			<th>Espace utilisé (Ko)</th>
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
				<td> $size_all</td>
				<td>". ($blocked == 0 ? "Débloqué" : "Bloqué") ."</td>
				<td><a href='Impersonate.php?id=$user_id' class='imp-style' target='_blank'>Impersonate User</a></td>
        	</tr>";
		}
	}
	?>
	</table>

	</div>
	
</body>
</html>