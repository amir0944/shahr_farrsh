<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
<?php
require_once 'databasse.php';
$product_id=$_GET['product-id'];
$user_ip=$_SERVER['REMOTE_ADDR'];
$delete=mysqli_query($db,"delete from cart where user_ip='$user_ip' and product_id='$product_id'");
if ($delete){
    header("Location: cart.php");
}