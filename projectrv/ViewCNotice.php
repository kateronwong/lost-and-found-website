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
			<div class="navigate">All Completed Notices</div>
            <div class="posts-table">
                <div class="table-head">
					<div class="type">Type</div>
                    <div class="topic">Topic</div>
					<div class="status">Status</div>
                    <div class="respond">Respond</div>
                    <div class="view">View</div>
                </div>
				<?php
					include "mysql-connect.php";
					$connect = mysqli_connect($server, $user, $pw, $db);
						
					if(!$connect) {
						die("Connection failed: " . mysqli_connect_error());
					}

					$userQuery = "SELECT * FROM notice where completed = 'T' ORDER BY date ASC";
					$result = mysqli_query($connect, $userQuery);
					
					if (mysqli_num_rows($result) == 0) {
						echo "No records were found with query $userQuery";
					}else { 
						while ( $row = mysqli_fetch_assoc($result)){
							$id= $row['notice_id'];
							echo "<div class='table-row'>";
								echo "<div class='type'>";
									echo $row['type'];
								echo "</div>";
								echo "<div class='topic'>";
								echo $row['topic'];
									echo "<br>";
									echo "Posted by " . "<i id='iw'>" .$row['creatorID'] . "</i>";
									echo " on " . $row['date'];
								echo "</div>";
								echo "<div class='status'>";
								if ($row['completed'] == "T")
								{
									echo "Completed!";
								}else
								{
									echo "Uncomplete!";
								}
								echo "</div>";
								
								if ($row['completed'] == "F")
								{
									echo "<div class='respond'>";
										echo "<a href ='Respond.php?id=$id'><button class='rbtn'>"."Respond"."</button></a>";
									echo "</div>";
								}else
								{
									echo "<div class='respond'>";
										echo "<a href ='Respond.php?id=$id'><button class='disrbtn' disabled>"."Respond"."</button></a>";
									echo "</div>";
								}
								echo "<div class='view'>";
									echo "<a href ='ViewNoticeD.php?id=$id'><button class='vbtn'>"."View"."</button></a>";
								echo "</div>";
							echo "</div>";
						}
					}
                
					?>

</body>
</html> 