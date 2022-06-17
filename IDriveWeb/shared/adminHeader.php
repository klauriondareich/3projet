

<?php

if(isset($_POST["logout"])){

    session_destroy();
    header("Location: Login_admin.php");
    exit(); 
}

    echo "<div class='admin-item'>
		<h1>Administration IDrive 
		<form action='' method='post'>
			<button class='logout-btn' type='submit' name='logout'>
				Se déconnecter
			</button>
        </form>
	</div>
";
?> 