<?php
require_once 'databasse.php';
$email=$_SESSION['user'];
$getUser=mysqli_query($db,"select * from users where username='$email'");
$user=mysqli_fetch_array($getUser);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پروفایل کاربر</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="asset/css/index.css">
    <script src="asset/js/tinymce/tinymce/tinymce.min.js"></script>
</head>
<body>
		<div class="container-fluid">
<div style="background-image: linear-gradient(red 0%,rgb(39, 39, 39)50%);">
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
        <a class="nav-link" href="logout.php">خروج</a>
      </li>
				      <li class="nav-item">
        <a class="nav-link" href="cart.php">سبد خرید</a>
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
	<br><br><br><br>
	<hr>
	<form action="#" style="margin: 40px 220px 40px 220px;
background-image: linear-gradient(red 0%,rgb(39, 39, 39)50%);
box-shadow: 2px 2px 50px gray;"  method="post">
		<label>تغیر گذرواژه:</label><br>
  <input type="text" placeholder="رمز..." style="width: 900px; height: 50px; margin:10px; direction: rtl;" name="oldpass">
  <input type="password" placeholder="رمز جدید" style="width: 900px; height: 50px; margin:10px; direction: rtl;" name="newpass">
   <input type="submit" value="ارسال" name="btnsave"style="width: 900px; height: 50px; margin:10px; direction: rtl;">
    <input type="reset" value="انصراف" class="btn btn-danger"style="width: 900px; height: 50px; margin:10px; direction: rtl;">
</form>
<hr><br>
</div>

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
</body>
</html>
<?php
if (isset($_POST['btnsave'])){
    $id=$user['id'];
    $oldPass=md5($_POST['oldpass']);
    $newPass=md5($_POST['newpass']);
    if ($oldPass == $user['password']){
        mysqli_query($db,"update users set password='$newPass' where id='$id'");
		 echo "<script>alert('پسورد با موفیت تغیر یافت')</script>";
    }
	else{
		 echo "<script>alert('دوباره تلاش کنید')</script>";
	}
}



















