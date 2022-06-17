<?php
session_start();
$session_id = $_GET["id"];
$file = $_GET["file"];

echo "uploads/$file";

if($_SESSION["logged"] != true){
		header("Location: Login.php");
	}

?>


<?php
if(isset($_REQUEST['destination']))
{
	$source = "uploads/$file";
	$destination = $_POST["destination"];

	if(copy($source, "$destination/$file"))
	{
		echo "Fichier copié avec succès!";
	}
}
?>

<html><body>
<form method="post" action="Paste.php?id=<?php echo $session_id?>&file=<?php echo $file?>">
	Destination : <input type="text" name="destination">
	<input type="submit">
</form>
<a href="Index.php?id=<?php echo $session_id?>">Home</a>
</body>
</html>
