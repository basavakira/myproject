<?php

$con=mysqli_connect('localhost','root','','medion1');

if(isset($_session['auth']))
{
    if(isset($_POST['scope']))
    {
        $scope = $_POST['scope']; 
        switch($scope){
            case "add":
                $prod_id = $_POST['prod_id'];
                $prod_qty = $_POST['prod_qty'];
                $user_id = $_session['auth_user']['user_id']; 
                
                $insert_query ="INSERT INTO carts SET user_id = '$user_id',
                                                       prod_id = '$prod_id',
                                                       prod_qty = '$prod_qty'"; 

                $query_run = mysqli_query($con,$insert_query);
                
                    if($query_run)
                    {
                        echo 201;
                    }
                       else
                    {
                        echo 500;
                    }
                break;

                default:
                echo 500;
        }
      }
    }
    else
    {
    echo 401;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="custom.js" type="text/javascript"></script>
    <title>Document</title>
</head>
<body>
    
</body>
</html>