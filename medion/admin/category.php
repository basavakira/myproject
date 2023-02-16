<?php
$con=mysqli_connect('localhost','root','','medion');
if(!$con){
  die("not connected");
}else{
  echo("connected");
}

if(isset($_POST['submit'])){
  $productname=mysqli_real_escape_string($con,$_POST['productname']);
  $price=mysqli_real_escape_string($con,$_POST['price']);
  $city=mysqli_real_escape_string($con,$_POST['city']);
  $feedback=mysqli_real_escape_string($con,$_POST['feedback']);

  $image=$_FILES['img'];
  
  $img_ext=PATHINFO($image,PATHINFO_EXTENSION);
  $filename=time().'.'.$img_ext;


  $sql="INSERT INTO category SET name='$productname',
                                  price='$price',
                                  city='$city',
                                  feedback='$feedback',
                                  image ='$filename'";
  $result=mysqli_query($con,$sql);
  if($result){
    move_uploaded_file($_FILES['img']['tmp_name'],$path.'/'.$filename);
    redirect("","added successfully");
  }else{
    redirect("","something went wrong");
  }
 
}







?>