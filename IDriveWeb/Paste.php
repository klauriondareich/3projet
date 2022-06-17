<?php

$session_id = $_GET["id"];
$file = $_GET["file"];





?>


<?php
if(isset($_REQUEST['destination']))
{
	$source = "C:/xampp/htdocs/3proj/IDriveMobile/public/uploads/$file";
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
