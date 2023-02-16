<?php

$con = mysqli_connect('localhost','root','','medion1');

if(!$con)
{
    die("not connected");
}
else
{
   // echo ("connected");
}
  function getallvalue($table)
   {
      global $con;
      $query = "SELECT * FROM $table";
      return $query_run =mysqli_query($con,$query);
   }
    function getSlugActive($table,$name)
   {
       global $con;
       $query_name = "SELECT * FROM $table where name='$name'";
       return $query_run = mysqli_query($con,$query_name);
       
   }

?>