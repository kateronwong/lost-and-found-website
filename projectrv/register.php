	<?php
		session_start();
		
		$ID=$_POST["ID"];
		$nickname=$_POST["nickname"];
		$email=$_POST["email"];
		$gender=$_POST["gender"];
		$birthday=$_POST["birthday"];
		$password=$_POST["password"];
		$age=$_POST["age"];

		$image = $_FILES['image']['name'];
		$target = "images/".basename($image);


		include "mysql-connect.php";
		$connect = mysqli_connect($server, $user, $pw, $db);
		
		if(!$connect) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$userQuery = "SELECT * FROM UserData WHERE ID= '$ID' ";
		$result = mysqli_query($connect, $userQuery);
		
		if (!$result) {
			die("Could not successfully run query.");
		}
		if (mysqli_num_rows($result) == 0) {
			$sql = "INSERT INTO UserData (ID, nickname, email, gender, birthday, password , images ,age) VALUES ('$ID', '$nickname', '$email', '$gender', '$birthday', '$password', '$image',$age)";
			if (mysqli_query($connect, $sql)){
				if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
					header('location: regsuc.php');
				}
			}else {
				die("Error! " . mysqli_connect_error());
			}
		}else {
			$_SESSION['msgr'] = "User already exit!";
			header('location: mainp.php');
		}
		
	?>