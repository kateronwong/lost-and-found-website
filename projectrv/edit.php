<!DOCTYPE html>
<?php 
	session_start(); 
	if(!isset($_COOKIE["ID"])){
		header('location: mainp.php');
	}
    $cookieid= $_COOKIE["ID"];
	include "mysql-connect.php";
						$connect = mysqli_connect($server, $user, $pw, $db);
						if(!$connect) {
							die("Connection failed: " . mysqli_connect_error());
						}
							$userQuery = "SELECT * FROM userdata where ID = '$cookieid'";
							$result = mysqli_query($connect, $userQuery);
							if (mysqli_num_rows($result) == 0) {
								echo "No records were found with query $userQuery";
							}else { 
								while ( $row = mysqli_fetch_assoc($result)){
									$usericon = $row['images'] ;
									$id = $row['ID'];
									$nickname = $row['nickname'];
									$email = $row['email'];
									$gender = $row['gender'];
									$birthday = $row['birthday'];
									$password = $row['password'];
									$age=$row['age'];
								}
							}
?>
<html>
<head>
	<title>Online Lost and Found System</title>
	<link rel="stylesheet" href="stylea.css">
</head>
	
<body>

<header>
        <div class="bar">
            <nav class="navigation">
                <ul class="nav-list">
                    <li class="nav-item">
					<?php 
						echo "<a href ='logout.php'>" . "LOGOUT" ."</a>";
						echo "</li>";
						echo "<li class='nav-item'>";
							echo "<a href ='ViewMyNotice.php?id=$cookieid'>". "View Myslef" ."</a>";
						echo "</li>";
					
						if ($_COOKIE["ID"] == "admin")
						{
							echo "<li class='nav-item'>";
								echo "<a href ='ViewUser.php'>"."View All Users"."</a>";
							echo "</li>";
							echo "<li class='nav-item'>";
								echo "<a href ='ViewPNotice.php'>"."View Pending Notices"."</a>"; 
							echo "</li>";
							echo "<li class='nav-item'>";
								echo "<a href ='ViewCNotice.php'>"."View Completed Notices"."</a>";
							echo "</li>";
						}
					?>
                    <li class="nav-item">
                        <a href ="homep.php">Home Page</a>
                    </li>
					
                    <a href="homep.php"><img class="bar-icon" src="sysicon.jpg"></a>
                    <div class="brand">
                        Lost&Found
						<?php
							include "mysql-connect.php";
							$connect = mysqli_connect($server, $user, $pw, $db);
								
							if(!$connect) {
								die("Connection failed: " . mysqli_connect_error());

							}
							$get = $_COOKIE["ID"];
							$userQuery = "SELECT nickname, images FROM userdata where ID ='$get'";
							$result = mysqli_query($connect, $userQuery);
							
							if (mysqli_num_rows($result) == 0) {
								echo "No records were found with query $userQuery";
							}else { 
								while ( $row = mysqli_fetch_assoc($result)){
									echo "<i id='welcome'>". "Welcome Back! " . "<img id='icon'src='images/".$row['images']."' >". "    ". $row['nickname'] . "</i>" ;
									
								}
							}
						?>
                    </div>
                </ul>
                    
            </nav>  
        </div>
    </header>
        
    <div class="container">
        <div class="navigate">Editing User Information</div>
			<div class='body'>
            <form class="createf" action="change.php" method = "post" enctype="multipart/form-data">
                    <label class="createf">Upload Image: </label>
					<input type="file" class="LInput" name="image">
                    <input type = "text" class="LInput" name="ID" placeholder=<?php echo $id;?> disabled>
                    <input type = "text" class="LInput" name="nickname" placeholder=<?php echo $nickname;?> >
                    <input type = "text" class="LInput" name="email" placeholder=<?php echo $email;?> >
                    <input type = "text" class="LInput" name="gender" placeholder=<?php echo $gender;?> >
                    <input type = "date" class="LInput" name="birthday" placeholder=<?php echo $birthday;?> >
					<input type = "text" class="LInput" name="age" placeholder=<?php echo $age;?> >
					<input type = "password" class="LInput" name="password" placeholder=<?php echo $password;?> >
                    <button type="submit" class="rbtn" name="subnot">Update</button>
				</form>
			</div>
	</div>
    </body>
</html> 
