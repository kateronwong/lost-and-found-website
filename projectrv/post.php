<?php
	session_start(); 
	if(!isset($_COOKIE["ID"])){
		header('location: mainp.php');
	}	
	
	$creatorID = $_COOKIE["ID"];
	$topic=$_POST["topic"];
	$type=$_POST["type"];
	$date=$_POST["date"];
	$venue=$_POST["venue"];
	$contact=$_POST["contact"];
	$description=$_POST["description"];
	$complete = "F";

	$image = $_FILES['image']['name'];
	$target = "images/".basename($image);
		
	include "mysql-connect.php";
	$connect = mysqli_connect($server, $user, $pw, $db);
	
	if(!$connect) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$userq2 = "SELECT noticenum FROM userdata where ID = '$creatorID' ";
	$result2 = mysqli_query($connect, $userq2);
	$row = mysqli_fetch_assoc($result2);
	$noticenum = $row['noticenum'];
	$noticenum = $noticenum + 1 ;

	$userQuery = "SELECT COUNT(*) FROM notice";
	$result = mysqli_query($connect, $userQuery);
	$row = mysqli_fetch_assoc($result);
	$number = $row['COUNT(*)'];
	$number = $number + 1; 
	
	$sql = "INSERT INTO notice (notice_id, creatorID, topic, type, date, venue, contact, description, completed, noticeimage) VALUES ('$number','$creatorID', '$topic', '$type', '$date', '$venue', '$contact', '$description', '$complete','$image' )";
	if (mysqli_query($connect, $sql)){
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		}
	}else {
		die("Error! 1" . mysqli_connect_error());
	}
	
	$sql2 = "UPDATE userdata SET noticenum = '$noticenum' WHERE ID = '$creatorID' ";
	if (mysqli_query($connect, $sql2)){
		header('location: createsuc.php');
	}else {
		die("Error! 2" . mysqli_connect_error());
	}


?>