<?php
include('myfunction.php');

$conn=mysqli_connect('localhost','root','','medion1');

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

  <title>Product</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
        <div class="col-md-10">
        <div class="card">
        <form class="forms-sample" method="post" >
            <input type="hidden" name="product_id">
               
                <form class="sample" method="post" enctype="multipart/form-data">
                <div class="card-header" style="">
                <h4 style="text-allign:center;"> Product </h4>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                                <th> id</th>
                                <th>name</th>
                                <th> price</th>
                                <th>
                                   image
                                </th>
                                <th> Edit</th>
                                <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                    $category = getall("category");
                    if(mysqli_num_rows($category)>0)
                    {
                        foreach($category as $item){
                            ?>
                            <tr>
                                <td> <?= $item['id']; ?></td>
                                <td> <?= $item['name']; ?></td>
                                <td> <?= $item['price']; ?></td>
                                <td>
                                   <img src="../images/<?= $item['image']; ?>" width="75px" height="75px" alt="<?= $item['name']; ?>">
                                </td>
                                <td> <a href="edit_product.php?id=<?= $item['id']; ?>" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="product_id" value="<?=$item['id'];?>">
                                        <button type="submit" class="btn btn-success" name="delete_product_btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        }else{
                        echo ("no data found");
                       }
                       ?>
                        </tbody>
                    </table>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>