<?php
		session_start();
		$ID=$_POST["ID"];
		$password=$_POST["password"];
        $passwordcof=$_POST["passwordcof"];
        $email=$_POST["email"];
		
        if ($password == $passwordcof)
        {
            include "mysql-connect.php";
            $connect = mysqli_connect($server, $user, $pw, $db);
            
            if(!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $userQuery = "SELECT * FROM UserData WHERE ID= '$ID' and email = '$email' ";
            $result = mysqli_query($connect, $userQuery);
            
            if (!$result) {
                die("Could not successfully run query.");
            }
            if (mysqli_num_rows($result) == 0) {
                $_SESSION['msg'] = "User doesn't exit or INCORRECT email!";
                header('location: forgetpw.php');
            }else {
                $sql2 = "UPDATE userdata SET password = '$password' WHERE ID = '$ID' ";
                if (mysqli_query($connect, $sql2)){
                    header('location: resetsuc.php');
                }else {
                    die("Error! " . mysqli_connect_error());
                }
            }
            
            mysqli_close($connect);
        }else{
            $_SESSION['msg'] = "Password is not the same!";
            header('location: forgetpw.php');
        }
?>
