<?php
$con=mysqli_connect('localhost','root','','medion1');

if(!$con){
    die("not connected");
}else{
   // echo ("connected");
}

function getall($table)
{
    global $con;
    $query = "SELECT * FROM $table";
   return $query_run =mysqli_query($con,$query);
}
  
function getById($table,$id){
    global $con;
    $query="SELECT * FROM $table where id='$id'";
    return $query_run= mysqli_query($con,$query);
}


?>