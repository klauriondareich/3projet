<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Upload Page</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="admin-body">

<div class="home-item">
<?php include("shared/userHeader.php")?>
<?php

	require("Connexion/Connexion_db.php");
	$session_id = $_GET['id'];

	
	?>



<?php
	$target_dir = 'C:/xampp/htdocs/3proj/IDriveMobile/public/uploads/';
	$uploadOk = 1;

	if(isset($_POST["submit"])){
		$uploadOk = 1;
		$file_path = time() . $_FILES["fileToUpload"]["name"];
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . basename($file_path));
		echo "Fichier uploadé avec succès";
		$filename = $_FILES["fileToUpload"]["name"];
		$user_id = $session_id;
		date_default_timezone_set('Europe/Paris');
		$upload_date = date('d-m-y h:i:s');
		$size=$_FILES["fileToUpload"]["size"];
		$file_type = pathinfo($filename, PATHINFO_EXTENSION);
		try{
				$sql = "INSERT INTO docs (nom, user_id, upload_date, size, file_type, file_path) VALUES (?,?,?,?,?,?)";
				$stmt = $connexion->prepare($sql);
				$stmt->execute([$filename, $user_id, $upload_date, $size, $file_type, $file_path]);
			}catch(PDOexception $e){
				echo $sql . "</br>" . $e->getMessage();
			}
		
	}
?>

	<form class="form-state" action="Upload_page.php?id=<?php echo $session_id?>" method="post" enctype="multipart/form-data">
	Selectionner une image
	<input type="file" name="fileToUpload" id="fileToUpload">
	<button type="submit" class="state-btn" name="submit">Upload l'image</button>
	</form>

<a href="Index.php?id=<?php echo $session_id?>">Retour à l'accueil</a>

</div>	

	

</body>
</html>
