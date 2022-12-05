<?php
	session_start(); 
	if(!isset($_COOKIE["ID"])){
		header('location: mainp.php');
	}	
    $cookieid= $_COOKIE["ID"];

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

    if(!isset($image) || trim($image) == '')
    {
    }else{
        $sql = "UPDATE userdata SET images = '$image' WHERE ID = '$cookieid' ";
        if (mysqli_query($connect, $sql)){
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            }
        }else {
            die("Error! " . mysqli_connect_error());
        }
    }

    if(!isset($nickname) || trim($nickname) == '')
    {
    }else{
        $sql = "UPDATE userdata SET nickname = '$nickname' WHERE ID = '$cookieid' ";
        if (mysqli_query($connect, $sql)){
        }else {
            die("Error! " . mysqli_connect_error());
        }
    }

    if(!isset($email) || trim($email) == '')
    {
    }else{
        $sql = "UPDATE userdata SET email = '$email' WHERE ID = '$cookieid' ";
        if (mysqli_query($connect, $sql)){
        }else {
            die("Error! " . mysqli_connect_error());
        }
    }

    if(!isset($age) || trim($age) == '')
    {
    }else{
        $sql = "UPDATE userdata SET age = '$age' WHERE ID = '$cookieid' ";
        if (mysqli_query($connect, $sql)){
        }else {
            die("Error! " . mysqli_connect_error());
        }
    }

    if(!isset($gender) || trim($gender) == '')
    {
    }else{
        $sql = "UPDATE userdata SET gender = '$gender' WHERE ID = '$cookieid' ";
        if (mysqli_query($connect, $sql)){
        }else {
            die("Error! " . mysqli_connect_error());
        }
    }

    if(!isset($birthday) || trim($birthday) == '')
    {
    }else{
        $sql = "UPDATE userdata SET birthday = '$birthday' WHERE ID = '$cookieid' ";
        if (mysqli_query($connect, $sql)){
        }else {
            die("Error! " . mysqli_connect_error());
        }
    }

    if(!isset($password) || trim($password) == '')
    {
    }else{
        $sql = "UPDATE userdata SET password = '$password' WHERE ID = '$cookieid' ";
        if (mysqli_query($connect, $sql)){
        }else {
            die("Error! " . mysqli_connect_error());
        }
    }

    header('location: ViewMyNotice.php');

?>