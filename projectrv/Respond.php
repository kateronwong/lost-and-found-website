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
					
					if ($_GET["id"]){
							$nid = $_GET["id"];
							$_SESSION['nid'] = $nid;
							$userQuery = "SELECT * FROM notice where notice_id = '$nid' ";
							$result = mysqli_query($connect, $userQuery);
							if (mysqli_num_rows($result) == 0) {
								echo "No records were found with query $userQuery";
							}else { 
								while ( $row = mysqli_fetch_assoc($result)){
									$type = $row['type'];
									$topic = $row['topic'];
									$date = $row['date'];
									$creatorID = $row['creatorID'];
									$venue = $row['venue'];
									$contact = $row['contact'];
									$desc = $row['description'];
									$completed = $row['completed'];
									$respond = $row['respond'];
									$rdate = $row['rdate'];
									$rp = $row['respondperson'];
									$nimg = $row['noticeimage'];
								}
							}
							$userQuery = "SELECT * FROM userdata where ID = '$creatorID' ";
								$result = mysqli_query($connect, $userQuery);
								if (mysqli_num_rows($result) == 0) {
									echo "No records were found with query $userQuery";
								}else { 
									while ( $row = mysqli_fetch_assoc($result)){
										$usericon = $row['images'] ;
									}
								}
						}
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
			<div class="btn-table">
				<div class="cbtn"><a href = "CreateNotice.php"><button id="cb">Create Notice</button></a></div>
				<div class="vabtn"><a href = "ViewNotice.php"><button id="vb">View Notices</button></a></div>
			</div>
			<div class="navigate">Responding to Notices</div>

			<div class="topic-container">
				<div class="head">
					<div class="authorsD">Author</div>
					<?php

									echo "<div class='typeD'>" ."Type: " . $type ."</div>";
									echo "<div class='topicD'>" . "Topic: " . $topic ."</div>";
									echo "<div class='dateD'>" . "Posted on: " .$date ."</div>";
									echo "</div>";
									echo "</div>";

									echo "<div class='body'>";
										echo "<div class='authorsD'>";
											echo "<div class='username'>" . $creatorID . "</div>";
											
										echo "<img src='images/". $usericon ."' >";
										
									echo "</div>";

										echo "<div class='content'>";
											echo "Venue: " . $venue ;
											echo "<br>";
											echo " Contact: ". $contact;
											echo "<hr>";
											echo  "Description: " ;
											echo "<br>";
											echo "<br>";
											echo  $desc ;
											echo "<br>";
											echo "<br>";
											echo "Images:" ;
											echo "<br>";
											echo "<img  class='nimg' src='images/". $nimg ."' >";
											echo "<hr>";
											echo "<br>";
											echo "<div class='comment'>";
												echo "<a href ='Respond.php?id=$nid'><button class='rbtn' disabled>"."Respond"."</button></a>";
												echo "</div>";
											echo "</div>";			
									?>
									</div>
									
									<!--Respond Section-->
									<div class="topic-container">
										<div class="head">
											<div class="rauthorsD">Respond</div>
										</div>
									</div>
									<div class='body'>
										<form class="createf" action="SubmitRespond.php" method = "post">
											<textarea style="width:100%; height:150px;background-color:black;" class="LInput" name="respond" placeholder="Respond Here" required></textarea>
											<input type="submit" class="rbtn" value="Respond" />
										</form>
									</div>

 </body>
</html> 

	
