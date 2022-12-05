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
			<div class="btn-table">
				<div class="cbtn"><a href = "CreateNotice.php"><button id="cb" disabled >Create Notice</button></a></div>
				<div class="vabtn"><a href = "ViewNotice.php"><button id="vb">View Notices</button></a></div>
			</div>
			<div class="navigate">Creating Notices</div>
			<div class='body'>
				<form class="createf" action="post.php" method = "post" enctype="multipart/form-data">
					<label class="createf" for="type">Lost/Found:</label>
					<select class="createf" name="type" id="type">
						<option class="createf" value="lost">Lost</option>
						<option class="createf" value="found">Found</option>
					</select>
					<input type = "date" class="LInput" name="date" required>
					<input type = "text" class="LInput" name="topic" placeholder="Notice Topic" required>
					<input type = "text" class="LInput" name="venue" placeholder="Venue" required>
					<input type = "text" class="LInput" name="contact" placeholder="Contact" required>
					<textarea style=" width:100%; height: 150px; background-color:black;" class="LInput" name="description" placeholder="description" required></textarea>
					<label class="createf">Upload Image: </label>
					<input type="file" class="LInput" name="image" required>
					<button type="submit" class="rbtn" name="subnot">Post</button>
				</form>
			</div>
	</div>
</body>
</html> 
