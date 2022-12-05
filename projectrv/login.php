	<?php
		session_start();
		$ID=$_POST["ID"];
		$password=$_POST["password"];
		
		include "mysql-connect.php";
		$connect = mysqli_connect($server, $user, $pw, $db);
		
		if(!$connect) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$userQuery = "SELECT * FROM UserData WHERE ID= '$ID' AND password='$password'";
		$result = mysqli_query($connect, $userQuery);
		
		if (!$result) {
			die("Could not successfully run query.");
		}
		if (mysqli_num_rows($result) == 0) {
			$_SESSION['msg'] = "User doesn't exit or incorrect password!";
			header('location: mainp.php');
		}else {
			setcookie("ID", $ID, time() + (60 * 60 * 24));
			header('location: homep.php');
		}
		
		mysqli_close($connect);
	?>
