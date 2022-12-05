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
			<div class="btn-table">
				<div class="cbtn"><a href = "CreateNotice.php"><button id="cb">Create Notice</button></a></div>
				<div class="vabtn"><a href = "ViewNotice.php"><button id="vb">View Notices</button></a></div>
			</div>
			<div class="navigate">All Users</div>
            <div class="posts-table">
                <div class="table-head">
					<div class="uicon"></div>
					<div class="usernickname">Name</div>
					<div class="age">Age</div>
					<div class="uemail">Email</div>
                    <div class="nnum">Notices Numbers</div>
					<div class="rnum">Responded Numbers</div>
					
                </div>
				<?php
					include "mysql-connect.php";
					$connect = mysqli_connect($server, $user, $pw, $db);
						
					if(!$connect) {
						die("Connection failed: " . mysqli_connect_error());
					}

					$userQuery = "SELECT * FROM userdata where ID != 'admin' ORDER BY nickname";
					$result = mysqli_query($connect, $userQuery);
					
					if (mysqli_num_rows($result) == 0) {
						echo "No records were found with query $userQuery";
					}else { 
						while ( $row = mysqli_fetch_assoc($result)){
							$uid= $row['ID'];
							echo "<div class='table-row'>";
								echo "<div class='uicon'>";
									echo "<img id='icon'src='images/".$row['images']."' >";
								echo "</div>";
								echo "<div class='usernickname'>";
								echo "<a href ='ViewMyNotice.php?id=$uid'>".$row['nickname']."</a>";
								echo "</div>";
								echo "<div class='age'>";
									echo $row['age'];
								echo "</div>";
								echo "<div class='uemail'>";
									echo $row['email'];
								echo "</div>";
								echo "<div class='nnum'>";
									echo $row['noticenum'];
								echo "</div>";
								echo "<div class='rnum'>";
									echo $row['respondnum'];
								echo "</div>";
								echo "</div>";
						}
					}
                
					?>
 			 </div>

			  

        </div>
		<div class="container">
			<div class="navigate">Notices Data Statistics</div>
			<div class="posts-table">
				<div class="table-head">
					<div class="ar">Age range</div>
                    <div class="nnum">Notices Numbers</div>
					<div class="rnum">Responded Numbers</div>
                </div>

				<?php
					include "mysql-connect.php";
					$connect = mysqli_connect($server, $user, $pw, $db);
						
					if(!$connect) {
						die("Connection failed: " . mysqli_connect_error());
					}

					$userQuery = "SELECT SUM(noticenum), SUM(respondnum) FROM userdata where age <18";
					$result = mysqli_query($connect, $userQuery);
					if (mysqli_num_rows($result) == 0) {
						echo "No records were found with query $userQuery";
					}else { 
						while ( $row = mysqli_fetch_assoc($result)){
							$u18 = $row['SUM(noticenum)'];
							$ru18 = $row['SUM(respondnum)'];
						}
					}
					$userQuery = "SELECT SUM(noticenum), SUM(respondnum) FROM userdata where age between 18 and 30";
					$result = mysqli_query($connect, $userQuery);
					if (mysqli_num_rows($result) == 0) {
						echo "No records were found with query $userQuery";
					}else { 
						while ( $row = mysqli_fetch_assoc($result)){
							$u30 = $row['SUM(noticenum)'];
							$ru30 = $row['SUM(respondnum)'];
						}
					}
					$userQuery = "SELECT SUM(noticenum), SUM(respondnum) FROM userdata where age between 31 and 50";
					$result = mysqli_query($connect, $userQuery);
					if (mysqli_num_rows($result) == 0) {
						echo "No records were found with query $userQuery";
					}else { 
						while ( $row = mysqli_fetch_assoc($result)){
							$u50 = $row['SUM(noticenum)'];
							$ru50 = $row['SUM(respondnum)'];
						}
					}
					$userQuery = "SELECT SUM(noticenum) , SUM(respondnum)FROM userdata where age between 51 and 70";
					$result = mysqli_query($connect, $userQuery);
					if (mysqli_num_rows($result) == 0) {
						echo "No records were found with query $userQuery";
					}else { 
						while ( $row = mysqli_fetch_assoc($result)){
							$u70 = $row['SUM(noticenum)'];
							$ru70 = $row['SUM(respondnum)'];
						}
					}
					$userQuery = "SELECT SUM(noticenum) , SUM(respondnum)FROM userdata where age > 70";
					$result = mysqli_query($connect, $userQuery);
					if (mysqli_num_rows($result) == 0) {
						echo "No records were found with query $userQuery";
					}else { 
						while ( $row = mysqli_fetch_assoc($result)){
							$a70 = $row['SUM(noticenum)'];
							$ra70 = $row['SUM(respondnum)'];
						}
					}
					
					echo "<div class='table-row'>";
							echo "<div class='ar'>". "[Under 18]". "</div>";
							echo "<div class='nnum'>".$u18."</div>";
							echo "<div class='rnum'>".$ru18."</div>";
					echo "</div>";
					echo "<div class='table-row'>";
							echo "<div class='ar'>". "[18 - 30]". "</div>";
							echo "<div class='nnum'>".$u30."</div>";
							echo "<div class='rnum'>".$ru30."</div>";
					echo "</div>";
					echo "<div class='table-row'>";
							echo "<div class='ar'>". "[30 - 50]". "</div>";
							echo "<div class='nnum'>".$u50."</div>";
							echo "<div class='rnum'>".$ru50."</div>";
					echo "</div>";
					echo "<div class='table-row'>";
							echo "<div class='ar'>". "[51 - 70]". "</div>";
							echo "<div class='nnum'>".$u70."</div>";
							echo "<div class='rnum'>".$ru70."</div>";
					echo "</div>";
					echo "<div class='table-row'>";
							echo "<div class='ar'>". "[Above 70]". "</div>";
							echo "<div class='nnum'>".$a70."</div>";
							echo "<div class='rnum'>".$ra70."</div>";
					echo "</div>";

				?>
			</div>	
		</div>	
</body>		
</html> 