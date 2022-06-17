<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
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
			$sql_update = "UPDATE users SET size_of_all_docs=$totalsize WHERE id=$nb";
			$update=$connexion->query($sql_update);
		}
	}
	$nb = $nb + 1;
}
	?>

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
			echo "<table>
    <thead>
        <tr>
            <th colspan='2'>$nom</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>$user_id</td>
            <td>$email</td>
            <td>$size_all</td>
            <td>$blocked</td>
            <td><a href='Impersonate.php?id=$user_id' target='_blank'>Impersonate User</a></td>
            
        </tr>
    </tbody>
</table>";


		}
	}
	?>


<?php

		if (isset($_REQUEST["id"]))
		{
			$id = $_REQUEST["id"];

			$sql_update1 = "UPDATE users SET blocked=1 WHERE id=$id";
			$update1=$connexion->query($sql_update1);
		}

	

		?>
<form class="block" action="Admin.php?id=<?php echo $session_id?>" method="post">
			<h1>Block a user</h1>
		<div id="log">
			<label for="id">Id de l'user</label>
			</br>
			<input type="int" id="id" name="id">
			</br>
			
			</br>
			<input type="submit" name="submit" value="block" class="block-button">
		</div>
</form>


<?php

		if (isset($_REQUEST["id_unblock"]))
		{
			$id = $_REQUEST["id_unblock"];

			$sql_update2 = "UPDATE users SET blocked=0 WHERE id=$id";
			$update2=$connexion->query($sql_update2);
		}
	

		?>
<form class="unblock" action="Admin.php?id=<?php echo $session_id?>" method="post">
			<h1>Unblock a user</h1>
		<div id="log">
			<label for="id_unblock">Id de l'user</label>
			</br>
			<input type="int" id="id_unblock" name="id_unblock">
			</br>
			
			</br>
			<input type="submit" name="submit" value="block" class="block-button">
		</div>
</form>
	
</body>
</html>