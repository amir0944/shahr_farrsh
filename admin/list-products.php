<?php
require_once '../databasse.php';
$query=mysqli_query($db,"select * from products");
?>
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
		<ul class="plist">
		<li><b>نام محصول</b></li><li><b>حذف/ویرایش</b></li><br><hr>
		        <?php while ($row=mysqli_fetch_array($query)){  ?>
		<li><?php echo $row['product_name'];?></li>
		<li>
			<a href="delete-products.php?id=<?php echo $row['id']; ?>">حذف</a>
			<a href="edit-products.php?eid=<?php echo $row['id'];?>">ویرایش</a>
		</li><br/><hr/>
        <?php } ?>

		</ul>
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




















