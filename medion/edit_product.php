<?php
include('myfunction.php');

$con=mysqli_connect('localhost','root','','medion1');
if(!$con){
    die("not connected");
}else{
    //echo("connected");
}
if(isset($_POST['update'])){
    $product_id=mysqli_real_escape_string($con,$_POST['product_id']);
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $price=mysqli_real_escape_string($con,$_POST['price']);
    $city=mysqli_real_escape_string($con,$_POST['city']);
    $feedback=mysqli_real_escape_string($con,$_POST['feedback']);

    $new_image=$_FILES['image']['name'];
    $old_image=$_POST['old_image'];

    if($new_image !=""){
      $update_filename =$new_image;
    }else{
      $update_filename =$old_image;
    }
    $path="../images";

    $sql="UPDATE category set name='$name',
                              price='$price',
                              city='$city',
                              feedback='$feedback',
                              image ='$update_filename' where id='$product_id'";
    $query_run=mysqli_query($con,$sql);
     
    If($query_run)
    {
      if($_FILES['image']['name'] !="")
      {
      move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$new_image);
         if(file_exists("images/".$old_image))
         {
          unlink("images/".$old_image);
         }
            }
      header('location:product.php');
        }else{
        header('location:edit_product.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <title>Document</title>
</head>
<body style="background-color:skyblue;">
    <div class="row">
        <div class="col-1">
       </div>
            <div class="col-9 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="allign:center;">Edit Product</h4>
                    <?php 
                        if(isset($_GET['id'])){
                            $id=$_GET['id'];
                            $product=getById("category",$id); 
                        if(mysqli_num_rows($product)>0)
                       {
                           foreach($product as $data)
                           {
                         ?>
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
                      <div class="form-group">
                        <label for="exampleInputName1"> Product Name</label>
                        <input type="text" class="form-control" value="<?=$data['name'] ?>" id="exampleInputName1" placeholder="Name" name="name">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleSelectGender">Price</label>
                        <input type="text" class="form-control" value="<?= $data['price'] ?>"id="exampleInputName1" placeholder="Price" name="price">
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <div class="input-group col-xs-12">
                          <span class="input-group-append">
                          <input type="file" name="image">
                          <label>current image</label>
                          <input type="hidden" name="old_image" value="<?= $data['image']?>">
                          <img src="../images/<?= $data['image']?>" width="75px" height="75px" alt=""> 
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" value="<?= $data['city'] ?>" id="exampleInputCity1" placeholder="Location" name="city">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Feedback</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="feedback"><?= $data['feedback'] ?></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="update">update</button>
                      <button class="btn btn-light" >Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
                   <?php
                           }
                       }
                    }else{
                         echo("not updated successfully");
                       }

                     ?>
                </body>
            </html>