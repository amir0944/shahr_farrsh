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
if (!isset($_SESSION['user'])){
    header("Location: login.php");
    die();
}
$product_id=$_GET['product-id'];
$user_ip=$_SERVER['REMOTE_ADDR'];
$count=mysqli_query($db,"select * from cart where product_id='$product_id' and user_ip='$user_ip'");
$count1=mysqli_fetch_array($count);
$product_count=$count1['product_count'];

if (mysqli_num_rows($count)>0){
    $s=1;
    $s=$s+$product_count;
    $edit=mysqli_query($db,"update cart set product_count='$s' where product_id='$product_id' and user_ip='$user_ip'");
    if ($edit){
        header("Location:index.php");
    }
}
else{
    $add=mysqli_query($db,"insert into cart(user_ip,product_id,product_count) values ('$user_ip','$product_id','1')");
    if ($add){
        header("Location:index.php");
    }
    else{
        echo "<script>alert('مشکلی پیش آمده است)</script>";
    }
}