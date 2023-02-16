<?php
session_start();

$con= mysqli_connect('localhost','root','','medion1');

if(!$con){
 die("not connected");
}
else{
   // echo("connected");
}
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);

    $sql ="select * from login where Email = '$email' and password = '$password'";
    //echo  $sql = "SELECT * FROM  login (Email, password)  VALUES ('$email', '$password')";

    $result = mysqli_query($con,$sql); 
   
    if(mysqli_num_rows($result)>0)
    {
         $_session['auth'] = true;
		 $user=mysqli_fetch_array($result);
		 $user_id=$user['id'];
		 $name=$user['username'];
		 $email=$user['Email'];
         $role_as=$user['role_as'];

		 $_session['auth_user'] = [
		 'user_id' => $user_id,
		 'name' => $name,
		 'email' => $email
	]; 

	$_session['role_as']=$role_as;

	if($role_as == 1){
		$_session['message']="welcome to dashboard";
	    header('location:admin/index.php');

	}
	else
	{
		$_session['message']="logged in successfully";
	    header('location:index.php');

	}
    }
    else
    {
    $_session['message']="invalid creditional";
	header('location:');
    }                        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script type="text/javascript" src="login.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name"/>
			<input type="email" placeholder="Email"/>
			<input type="password" placeholder="Password"/>
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="" method="post">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" placeholder="Email" name="email"/>
			<input type="password" placeholder="Password" name="password"/>
			<a href="#">Forgot your password?</a>
			<button name="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<a href="signup.php"><button class="ghost" id="signUp"> Sign Up</button></a>
			</div>
		</div>
	</div>
</div>
</body>
</html>