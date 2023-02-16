<?php
$host = 'localhost';
$username = 'root';
$password = '';
$databasename = 'medion1';

$con = mysqli_connect($host,$username,$password,$databasename);


if(!$con){
 die("not connected");
}
else{
   // echo("connected");
}
session_start();
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);

    $sql ="select * from login where Email = '$email' and password = '$password'";
    //echo  $sql = "SELECT * FROM  login (Email, password)  VALUES ('$email', '$password')";

    $result = mysqli_query($con,$sql);
   
    if(mysqli_num_rows($result)>0)
    {
         $_session['auth']=true;
		 $user=mysqli_fetch_array($result);
		 $name=$user['username'];
		 $email=$user['Email'];
         $role_as=$user['role_as'];

		 $_session['auth_user'] = [
		'name' => $name,
		'email' => $email
	]; 

	$_session['role_as']=$role_as;

	if($role_as == 1){
		$_session['message']="welcome to dashboard";
	    header('location:admin/index.php');

	}else{
		$_session['message']="logged in successfully";
	    header('location:index.php');
	}
    }
    else
    {
    $_session['message']="invalid creditional";
	header('location:index.php');
    }                        
}
?>
