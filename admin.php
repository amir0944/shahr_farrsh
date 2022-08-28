<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/bootstrap.rtl.min.css">
	<link rel="stylesheet" href="asset/css/index.css">
	<link rel="stylesheet" href="asset/css/reset.css">
	<title>Document</title>
</head>
<body style=" background-color:#E8E8E8;">
	<div class="container-fluid">
<div style="background-image: linear-gradient(red 0%,rgb(39, 39, 39)50%); border-radius: 20px;">
	<header style="box-shadow: 0px 6px 9px 0px grey;">
		<!-- logo -->
<img src="img/header.jpg" alt="logo" style=" width: 1553px;">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="img/menulogo.jpg.png" alt=""></a>
  <button class="navbar-toggler x" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample05">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">درباره ما</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">فاکتور خرید</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ورود </a>
        <div class="dropdown-menu" aria-labelledby="dropdown05">
          <a class="dropdown-item" href="register.php">ثبت نام</a>
          <a class="dropdown-item" href="login.php">ورود کاربر</a>
          <a class="dropdown-item" href="admin.php">ورود مدیر</a>
        </div>
      </li>
            <li class="nav-item active">
        <a class="nav-link" href="index.php" style="font-size: 24px;padding: 0px 30px;">صفحه اصلی</a>
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
	<br><br><br><br><br>
    <form style="background-image: linear-gradient(red 0%,rgb(39, 39, 39)50%);
box-shadow: 2px 2px 50px gray;margin: 40px 220px 40px 220px;" method="post">
		<label>ورود مدیر:</label><br>
  <input type="text" placeholder="نام کاربری را وارد کنید" style="width: 900px; height: 50px; margin:10px; direction: rtl;" name="username">
  <input type="password" placeholder="پسورد را وارد کنید" style="width: 900px; height: 50px; margin:10px; direction: rtl;" name="password">
<input type="submit" value="ارسال" name="submit"style="width: 900px; height: 50px; margin:10px; direction: rtl;">
    <input type="reset" value="انصراف" class="btn btn-danger"style="width: 900px; height: 50px; margin:10px; direction: rtl;">
</form>

	<footer>
		<div class="footer">
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
				<hr><img src="img/star1.png" alt="image footer"><hr>
			</li>
		</ul>
			</div>
	</footer>
	</div>
	<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/bootstrap.bundle.min.js"></script>
	</div>
</body>
</html>
<?php
require_once 'databasse.php';
if (isset($_POST['submit'])){
    $username=$_POST['username'];
    $pass=$_POST['password'];
    if ($username==ADMINUSER && $pass==PASSWORD){
        $_SESSION['admin']=$username;
        header("Location: admin/adindex.php");
    }
    else{
        echo "<script>alert('شما مدیر نیستید!')</script>";
    }
}