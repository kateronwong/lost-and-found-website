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

			<form action="mainp.php" method = "post">
				<button type="submit" class="bSubbtn" name="back">Back</button>
			</form> 

			<div class="foglabel">
				<h3 id="fl">Reset Password</h3> 
			</div>
			
			<div class="sysicon">
				<img id="sys" src="sysicon.jpg" alt="icon" >
			</div>


			<form id="loginf" class="inputform" action="ResetPw.php" method = "post">
				
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
				<input type = "text" class="LInput" name="email" placeholder="Email" required>
				<input type = "password" class="LInput" name="password" placeholder="New Password" required>
				<input type = "password" class="LInput" name="passwordcof" placeholder="Password Again" required>
				<button type="submit" class="Subbtn" name="forpass">Reset Now!</button>
				
			</form>

			
		</div>
	</div>

</body>
</html> 