<!DOCTYPE html>
<html>
<head>
	<title>Impersonate User</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="admin-body">
	<div class="home-item">

	<?php
	
	require("Connexion/Connexion_db.php");
	$session_id = $_GET['id'];

	
	
	?>

	<?php include("shared/adminHeader.php")?> 

	<table class="table-view">
		<tr>
			<th>Nom du fichier</th>
			<th>Date d'ajout</th>
			<th>Taille (Ko)</th>
			<th>Type de fichier</th>
			<th>Preview</th>
			<th>Actions</th>
		</tr>

	<?php
	$sql_select = "SELECT * FROM docs WHERE user_id='$session_id'";
	$docs=$connexion->query($sql_select);

	if($docs->rowCount()>0)
	{
		while($row = $docs->fetch(PDO::FETCH_ASSOC)){
			$filename = $row["nom"];
			$upload_date = $row["upload_date"];
			$size = $row["size"];
			$file_type = $row["file_type"];
			$file_path = $row["file_path"];
			
     
			echo "
			<tr>
			
				<td>$filename</td>
				<td>$upload_date</td>
				<td>$size</td>
				<td>$file_type</td>
				<td>
					<object data='../IDriveMobile/public/uploads/$file_path' width='50' height='50'></object> </br>
					<a href='../IDriveMobile/public/uploads/$file_path' class='imp-style' target='_blank'>$filename</a>
				</td>
				<td> <a href='Paste.php?id=$session_id&file=$file_path'  class='imp-style'>Copier & coller</a></td>
			</tr>";
		}
	}
	?>
	</table>

</body>

</html>
