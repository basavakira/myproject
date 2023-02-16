<?php
session_start();
$con = mysqli_connect('localhost','root','','medion1');

if(!$con){
    die("connection failed");
}else{
   // echo("connection successfull");
}

if(isset($_POST['submit'])){
$name=mysqli_real_escape_string($con,$_POST['Username']);
$mail=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$pass=mysqli_real_escape_string($con,$_POST['repassword']);

if($password==$pass){
    $sqli= "INSERT INTO login set username = '$name',
                                  Email = '$mail',
                                  password = '$password',
                                  confpassword = '$pass'";
                               
    $result= mysqli_query($con,$sqli);

if($result){
    $_session['message']="sign in successfully";
}else{
    $_session['message']="inserted not successfully";
}
}else{
    $_session['message'] ="password dont match";
    header('locatin:signup.php');
}
}

?>

<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title> SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<link rel="stylesheet" href="signup.css">
<!-- //web font -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
	
		<h1> SignUp </h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
			<?php 
	            if(isset($_session['message']))
	            {
	            ?>
	        <div class="alert alert-dark" role="alert">
            <?=$_session['message'];?>
            </div>
            <?php
	         unset($_session['message']);
	        }
            ?>
		
				<form action="#" method="post">
					<input class="text" type="text" name="Username" placeholder="Username" required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="repassword" placeholder="Confirm Password" required="">
					<div class="wthree-text">
					
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGNUP" name="submit">
				</form>
				<p>Don't have an Account? <a href="login.php"> Login Now!</a></p>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>