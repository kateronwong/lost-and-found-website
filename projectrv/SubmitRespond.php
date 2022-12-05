<?php
	session_start(); 
	if(!isset($_COOKIE["ID"])){
		header('location: mainp.php');
	}	
	
	$respond=$_POST["respond"];
	$complete = "T";
	$rdate = date("Y/m/d");
    $nid = $_SESSION['nid'];
    $respondperson = $_COOKIE["ID"];

	include "mysql-connect.php";
	$connect = mysqli_connect($server, $user, $pw, $db);
	
	if(!$connect) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$userq2 = "SELECT respondnum FROM userdata where ID = '$respondperson' ";
	$result2 = mysqli_query($connect, $userq2);
	$row = mysqli_fetch_assoc($result2);
	$respondnum = $row['respondnum'];
	$respondnum = $respondnum + 1 ;

	$sql = "UPDATE notice SET completed = '$complete', 
    respond='$respond', rdate = '$rdate', respondperson ='$respondperson'
     WHERE notice_id='$nid'";
	if (mysqli_query($connect, $sql)){
	}else {
		die("Error! " . mysqli_connect_error());
	}
	
	$sql2 = "UPDATE userdata SET respondnum = '$respondnum' WHERE ID = '$respondperson' ";
	if (mysqli_query($connect, $sql2)){
		header('location:responsuc.php');
	}else {
		die("Error! " . mysqli_connect_error());
	}

?>