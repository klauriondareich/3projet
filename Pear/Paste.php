<?php
$session_id = $_GET["id"];
$file = $_GET["file"];

echo "uploads/$file";

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
</body>
</html>