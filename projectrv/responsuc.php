<!DOCTYPE html>
<?php 
	session_start(); 
	if(!isset($_COOKIE["ID"])){
		header('location: mainp.php');
	}
	$cookieid= $_COOKIE["ID"];
?>
<html>
<head>
	<title>Online Lost and Found System</title>
	<link rel="stylesheet" href="stylea.css">
	<script src="togg.js"></script>
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
        <div class="createlabel">Respond Successful!</div>
    </div>
    <div class="container">
			<div class="btn-table">
				<div class="vabtn"><a href = "ViewNotice.php"><button id="vb">View Notices</button></a></div>
			</div>
	</div>
    </body>
</html> 
