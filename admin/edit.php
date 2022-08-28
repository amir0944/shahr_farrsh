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
require_once '../databasse.php';
if (isset($_POST['btnupd'])){
    $pid=$_POST['pid'];
    $pname=$_POST['pname'];
    $pprice=$_POST['pprice'];
    $pdesc=$_POST['pdesc'];
    $file=$_FILES['pimage'];
    // بررسی آپلود شدن فایل
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "<script>alert('رخداد خطا در هنگام آپلود فایل. لطفا مجددا تلاش نمایید')</script>";
        return;
    }

// گرفتن پسوند فایل
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

// تعریف پسوندهای مجاز برای آپلود
    $valid_extensions = array('jpg', 'jpeg', 'png', 'gif');

// بررسی پسوند فایل با لیست سفید مجاز
    if (false === in_array($extension, $valid_extensions)) {
        echo "<script>alert('پسوند فایل انتخاب شده غیر مجاز است')</script>";
        return;
    }


// فایل به درستی آپلود شده است و پسوند آن هم مجاز است
    $destination = '../asset/images/products/';
    $filename = basename($file['name']);
    $c=$destination . $filename;
    if (file_exists($c)) {
        echo "<script>alert('ببخشید!عکس با این نام موجود است')</script>";
        return;
    }

// انتقال فایل با دستور مخصوص انتقال فایل‌های آپلودی
    move_uploaded_file($file['tmp_name'], $destination . $filename);

// نمایش پیام موفقیت آپلود
    echo "<script>alert('آپلود فایل با موفقیت به انجام رسید')</script>";

    $edit=mysqli_query($db,"update products set product_name='$pname',product_price='$pprice',
                        product_desc='$pdesc',product_image='$c' where id='$pid'");
    if ($edit){
        header("Location: list-products.php");
    }
    else{
        echo "<script>alert('مشکلی پیش آمده است مجددا تلاش کنید!')</script>";
    }
}