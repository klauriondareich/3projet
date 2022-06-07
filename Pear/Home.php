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
	$sql_select = "SELECT * FROM docs WHERE user_id='$session_id'";
	$docs=$connexion->query($sql_select);

	if($docs->rowCount()>0)
	{
		while($row = $docs->fetch(PDO::FETCH_ASSOC)){
			$filename = $row["nom"];
			$upload_date = $row["upload_date"];
			$size = $row["size"];
			$file_type = $row["file_type"];
			echo "<table>
    <thead>
        <tr>
            <th colspan='2'>$filename</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>$upload_date</td>
            <td>$size</td>
            <td>$file_type</td>
        </tr>
    </tbody>
</table>";
		}
	}
	?>

	<a href="Upload_page.php?id=<?php echo $session_id?>">Upload</a>
</body>
</html>