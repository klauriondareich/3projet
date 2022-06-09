<?php
	$user = "root";
	$mdp = "";

	try {
		$connexion = new PDO('mysql:host=localhost;dbname=pear', $user, $mdp);

		$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch (PDOException $e) {
    echo "Connexion ratée: " . $e->getMessage();
}
?>