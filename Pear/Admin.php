<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<?php
	require("Connexion/Connexion_db.php");
	$session_id = $_GET['id'];
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
            <td><a href='Home.php?id=$user_id' target='_blank'>Impersonate User</a></td>
        </tr>
    </tbody>
</table>";
		}
	}
	?>

	
</body>
</html>