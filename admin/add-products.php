<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پروفایل کاربر</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="../asset/css/index.css">
    <script src="../asset/js/tinymce/tinymce/tinymce.min.js"></script>
</head>
<body>
		<div class="container-fluid">

	
	
	
	<header style="box-shadow: 0px 6px 9px 0px grey;">
		<!-- logo -->
<img src="../img/header.jpg" alt="logo" style=" width: 1553px;">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="../img/menulogo.jpg.png" alt=""></a>
  <div class="collapse navbar-collapse" id="navbarsExample05">
    <ul class="navbar-nav mr-auto">
	<li class="nav-item">
        <a class="nav-link" href="adlogout.php">خروج</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="list-users.php">لیست کاربران</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="list-products.php">لیست محصولات</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="add-products.php">افزودن محصول</a>
      </li>
            <li class="nav-item active">
        <a class="nav-link" href="../index.php" style="font-size: 24px;padding: 0px 30px;">صفحه اصلی</a>
      </li>
    </ul>
    <form style=" border-radius: 10px;  width: 400px;
    background-color: white;">
    	<input type="submit" value="Search" class="btn btn-light" style="  width: 80px;
    right: 30px;
    top: 14px;
    position: absolute;
border: 1px solid;
    ">
      <input class="form-control" type="text" placeholder="Search" style="height:50px;">
    </form>
  </div>
</nav>
	</header>
    <div style="background-image: linear-gradient(red 0%,rgb(39, 39, 39)50%); border-radius: 20px;margin-top: -20px;">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
        <form action="add-products.php" method="post"   enctype="multipart/form-data" 
			  style="background-image: linear-gradient(red 0%,rgb(39, 39, 39)50%);
box-shadow: 2px 2px 50px gray;margin: 40px 220px 40px 220px;">
			<label>افزودن محصول:</label><br>
            <input type="text" placeholder="نام محصول..." name="pname"style="width: 900px; height: 50px; margin:10px; direction: rtl;"><br>
            <input type="text" placeholder="قیمت محصول..." name="pprice"style="width: 900px; height: 50px; margin:10px; direction: rtl;"><br>
            <textarea name="pdesc" placeholder="توضیحات محصول..."style="width: 900px; height: 50px; margin:10px; direction: rtl;"></textarea><br>
            <input type="file" name="pimage"style="width: 900px; height: 50px; margin:10px; direction: rtl;"><br>
            <input type="submit" value="ذخیره محصول" name="btnsave"style="width: 900px; height: 50px; margin:10px; direction: rtl;">
            <input type="reset" value="انصراف" class="btn btn-danger"style="width: 900px; height: 50px; margin:10px; direction: rtl;">
        </form>	
		<br>
    </div>
<footer>
		<div class="footer" style="margin-top: -20px;">
		<ul class="flist">
			<li>

					<hr><a href="#">سازمان های طرف قرار داد</a><hr>
		<hr>	<a href="#">ارسال سفارشات</a><hr>
<hr>		<a href="#">درباره شهر فرش</a><hr>


			</li>
			<li>

					<hr><a href="#">سوالات متداول</a><hr>
				<hr><a href="#">تماس با ما</a><hr>
			<hr><a href="#">ارتباط با ما</a><hr>

			</li>
			<li>

					<hr><a href="#">پشتیبانی بیستوچهار ساعته </a><hr>
					<hr><a href="#">شماره تماس:09376560944</a><hr>
					<hr><a href="#">ایمیل:seyyediniasar@gmail.com</a><hr>

			</li>
			<li>
				<hr><img src="../img/star1.png" alt="image footer"><hr>
			</li>
		</ul>
			</div>
	</footer>
				</div>
</body>
</html>
<?php
require_once '../databasse.php';
if (isset($_POST['btnsave'])){
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

    $add=mysqli_query($db,"insert into products(product_name,product_price,product_desc,product_image)
                      values ('$pname','$pprice','$pdesc','$c')");
    if ($add){
        echo "<script>alert('محصول با موفقیت دخیره شد.')</script>";
    }
    else{
        echo "<script>alert('خطایی رخ داد')</script>";

    }
}




















