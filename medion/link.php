<?php
$con= mysqli_connect('localhost','root','','medion');

if(!$con){
 die("not connected");
}
 else{
    //echo("connected");
 }

if(isset($_POST['submit'])){
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);

    $sql= "INSERT INTO login WHERE Email='$email',
                                    password='$password'";

   $result= mysqli_query($con,$sql);

   if($result)
   {
    echo "data inserted sucessfully";
   }
    else
   {
    echo "not inserted";
   }                          
}


?>