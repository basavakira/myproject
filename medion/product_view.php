<?php
include('myfunction.php');

include('usermyfunction.php');

$conn=mysqli_connect('localhost','root','','medion');

if(!$conn){
    die("not connected");
}else{
   // echo("connected");
}
if(isset($_POST['delete_product_btn'])){
    $product_id=mysqli_real_escape_string($conn,$_POST['product_id']);

    $sql= "DELETE FROM category where id='$product_id'";

    $query_run=mysqli_query($conn,$sql);

    if($query_run){
      header('location:product.php');
    }else{
        header('location:product.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>


  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  
  

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700|Roboto:400,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />


  <title>Product-view</title>
</head>
<body>

    <!-- header section strats -->
    
      
 
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3" style="background-color:rgb(60, 179, 113); ">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="">
            <span>
              Medion
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex  flex-column flex-lg-row align-items-center w-100 justify-content-between">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html"> About </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="medicine.html"> Medicine </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="buy.html"> Online Buy </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact us</a>
                </li>
              </ul>
              <?php 
              if(isset($_session['auth']))
              {
                ?>
              <form class="form-inline ">
                <input type="search" placeholder="Search">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
              <div class="login_btn-contanier ml-0 ml-lg-5">
              <a href="login.php">
              <?= $_session['auth_user']['name']; ?>
                <img src="images/user.png" alt="">
                Login out
                 </a>
              </div>
            <?php
              }
              else{
                ?>
                <form class="form-inline ">
                <input type="search" placeholder="Search">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
              <div class="login_btn-contanier ml-0 ml-lg-5">
                <a href="login.php">
                  <img src="images/user.png" alt="">
                  Login
                  </a>
              </div>
            <?php

              }
              ?>
              
            </div>
          </div>

        </nav>
                  <?php
                    if(isset($_GET['product'])){
                    $name=$_GET['product'];
                    $category=getSlugActive("category",$name);
                    if(mysqli_num_rows($category)>0)
                    {
                        foreach($category as $data){
                            ?>
                          <div class="bg-light py-4">
                            <div class="container product_data">
                                    <div class="row">
                                    <div class="col-md-4">
                                        <div class="shadow">
                                <img src="../images/<?= $data['image']; ?>" width="300px" height="300px" alt="" class="W-100">
                                    </div>
                                    </div>
                                      <div class="col-md-8">
                                        <h4><?= $data['name'];?></h4>
                                        <hr>
                                        <p><?= $data['feedback'];?></p>
                                        <hr>
                                        <h5>RS <span class="text-success fw-bold"> <?= $data['price'];?></span></h5>
                                          <div class="row">
                                            <div class="col-md-4" >
                                              <div class="input-group mb-3" style="width:130px;">
                                            <button class="input-group-text decrement-btn">-</button>
                                             <input type="text" class="form-control text-center input-qty bg-white"  value="1" aria-label="Amount (to the nearest dollar)" >
                                            <button class="input-group-text increment-btn">+</button>
                                             </div>
                                            </div>
                                          </div>
                                          <div class="row mt-3">
                                            <div class="col-md-6">
                                            <button class="btn btn-primary addtocart px-4" value="<?= $data['id'];?>"><i class="fa fa-shopping-cart me-2"></i>  Add to cart</button>
                                            </div>
                                            <div class="col-md-6">
                                            <button class="btn btn-danger px-4"><i class="fa fa-heart me-2"></i>  Add to Wishlist </button>
                                            </div>
                                       </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                        }
                    }
                }
                else
                {
                        echo ("no data found");
                    }
                    ?>
            
              </body>
          </html>