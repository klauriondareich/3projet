<!DOCTYPE html>
<html>
<body>

<?php
session_start();
	require("Connexion/Connexion_db.php");
	$session_id = $_GET['id'];

	if($_SESSION["logged"] != true){
		header("Location: Login.php");
	}
	?>



<?php
	$target_dir = '../IDriveMobile/public/uploads/';
	$uploadOk = 1;

	if(isset($_POST["submit"])){
		$uploadOk = 1;
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . basename($_FILES["fileToUpload"]["name"]));
		echo "Fichier uploadé avec succès";
		$filename = $_FILES["fileToUpload"]["name"];
		$user_id = $session_id;
		date_default_timezone_set('Europe/Paris');
		$upload_date = date('d-m-y h:i:s');
		$size=$_FILES["fileToUpload"]["size"];
		$file_type = pathinfo($filename, PATHINFO_EXTENSION);
		try{
				$sql = "INSERT INTO docs (nom, user_id, upload_date, size, file_type) VALUES (?,?,?,?,?)";
				$stmt = $connexion->prepare($sql);
				$stmt->execute([$filename, $user_id, $upload_date, $size, $file_type]);
			}catch(PDOexception $e){
				echo $sql . "</br>" . $e->getMessage();
			}
		
	}
?>

<form action="Upload_page.php?id=<?php echo $session_id?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<a href="Index.php?id=<?php echo $session_id?>">Home</a>

	

	

</body>
</html>
