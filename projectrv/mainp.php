<!DOCTYPE html>
<html>
<head>
	<title>Online Lost and Found System</title>
	<link rel="stylesheet" href="stylea.css">
	<script src="togg.js"></script>
</head>
	
<body>
	<?php session_start(); ?>
	
	<div class="outer">
	
		<div class="formlayer">
		
			<div class="buttonlayer">
				<div id = "btnstyle"></div>
				<button typ="button" class="toggle" onclick="cli()">Log In</button>
				<button typ="button" class="toggle" onclick="crg()">Register</button>
			</div>
			
			<div class="sysicon">
				<img id="sys" src="sysicon.jpg" alt="icon" >
			</div>
			
			<form id="loginf" class="inputform" action="login.php" method = "post">
				<p id="massage"  style="color:red" >
					<?php
						if(isset($_SESSION['msg']) && $_SESSION['msg'] != '')
					   {
							echo $_SESSION['msg'];
							$_SESSION['msg'] = '';
					   }
					?>
				</p>
				<input type = "text" class="LInput" name="ID" placeholder="User ID" required>
				<input type = "password" class="LInput" name="password" placeholder="Password" required>
				<a id="forgetpw" href ="forgetpw.php"> Forget Password? Reset Now! </a>
				<button type="submit" class="Subbtn" name="login">Log In</button>
				
			</form>
			
			<form id="regf" class="inputform" action="register.php" method = "post" enctype="multipart/form-data">
				<p id="massage"  style="color:red" >
					<?php
						if(isset($_SESSION['msgr']) && $_SESSION['msgr'] != '')
					   {
							echo $_SESSION['msgr'];
							$_SESSION['msgr'] = '';
							echo '<script type="text/javascript">crg();</script>';
					   }
					?>
				</p>
				<label class="LInput">User Icon </label>
				<input type="file" name="image" required>
				<input type = "text" class="LInput" name="ID" placeholder="User ID" required>
				<input type = "text" class="LInput" name="nickname" placeholder="Nickname" required>
				<input type = "text" class="LInput" name="email" placeholder="Email" required>
				<input type = "text" class="LInput" name="gender" placeholder="Gender(M/F)" required>
				<input type = "date" class="LInput" name="birthday" placeholder="Birthday(yyyy/mm/nn)" required>
				<input type = "text" class="LInput" name="age" placeholder="Age" required>
				<input type = "password" class="LInput" name="password" placeholder="Password" required>
				<button type="submit" class="Subbtn" name="register">Register</button>
			</form>
			

		</div>
	</div>

</body>
</html> 