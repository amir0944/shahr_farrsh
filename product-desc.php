<?php 
require_once('databasse.php');
$id=$_GET['pid'];
$pro=mysqli_query($db,"select * from products WHERE id='$id'");
$row=mysqli_fetch_array($pro);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
	<?php if (isset($_SESSION['user'])){ ?>
                <p style="text-align: right;padding: 30px 30px 30px 0px;">کاربر گرامی <?php echo $_SESSION['user'];?>خوش آمدید.
                    <a href="profile.php" style="float: left;" class="btn btn-dark">نمایش پروفایل</a>
                </p>
    <?php } ?>
		<!-- logo -->
			<img src="img/header.jpg" alt="logo" style=" width: 1553px;">
		<!--meno-->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="img/menulogo.jpg.png" alt=""></a>

  <div class="collapse navbar-collapse" id="navbarsExample05">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">درباره ما</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">فاکتور خرید</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ورود/ثبت نام</a>
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
	
		<div class="cart">
		<li><img src="<?php $pic=$row['product_image'];$img=substr($pic,3);echo $img;?>" style="width: 100px;height: 100px;" ></li>
		<li><h2> <?php echo $row['product_name'];?></h2></li>
		<li>توضیحات: <?php echo $row['product_desc'];?></li>
		<li>قیمت: <?php echo $row['product_price'];?></li><br>
				<button class="btn btn-danger" ><a href="add-to-cart.php?product-id=<?php echo $row['id'];?>">اضافخ کردن به سبد خرید</a></button>
	</div>


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



















