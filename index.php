<?php 
require_once('databasse.php');
$pro=mysqli_query($db,"select * from products");
?>
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
<body style="background-color: #E8E8E8;">
	<div class="container-fluid">
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
	<?php if (isset($_SESSION['username'])){ ?>
        <div class="row">
            <div class="col" style="height: 60px;">
                <p style="text-align: right;">کاربر گرامی <?php echo $_SESSION['username'];?>خوش آمدید.
                    <a href="profile.php" style="float: left;" class="btn btn-dark">نمایش پروفایل</a>
                </p>
            </div>
        </div>
    <?php } ?>
	<!--slide-->
	<section>
		<div class="row" style="margin-right: 120px;">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner" style="width: 1360px;
margin: 0px 0px 0px 20px;">
				  <div class="carousel-item active">
					<img class="d-block w-100" src="img/1.jpg" alt="First slide">
				  </div>
				  <div class="carousel-item">
					<img class="d-block w-100" src="img/2.jpg" alt="Second slide">
				  </div>

				</div>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="prev">
				  <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color:black; width: 60px;
				  height: 100px;"></span>
				  <span class="sr-only" >Previous</span>
				</a>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="next">
				  <span class="carousel-control-next-icon" aria-hidden="true" style="background-color:black; width: 60px;
				  height: 100px;"></span>
				  <span class="sr-only">Next</span>
				</a>
			  </div>
		</div><br>
	</section>
<!--bottom slider-->
		<div class="content2">
			<h1>دسته بندی فرش ها</h1>
			<div style="background-image: url(img/گرد.jpg);"><P>گرد</P></div>
			<div style="background-image: url(img/700شونه.jpg);"><P>700شونه</P></div>
			<div style="background-image: url(img/کودک.jpg);"><P>کودک</P></div>
			<div style="background-image: url(img/700شونه.jpg);"><P>700شونه</P></div>
			<div style="background-image: url(img/کودک.jpg);"><P>کودک</P></div>
			<div style="background-image: url(img/1200شونهه.jpg);"><P>1200شونه</P></div>
			<div style="background-image: url(img/کلاسیک.jpg);"><P>کلاسیک</P></div>
			<div style="background-image: url(img/1500شونه.jpg);"><P>1500شونه</P></div>
			<div style="background-image: url(img/ماشینی.jpg);"><P>ماشینی</P></div>
			<div style="background-image: url(img/تابلو\ فرش.jpg);"><P>تابلو</P></div>
			<div style="background-image: url(img/دسباف.jpg);"><P>دستباف</P></div>
			<div style="background-image: url(img/تخفیفی.jpg);"><P>فانتزی</P></div>		
		</div>
<!--		new products-->
	<div class="content3" style="text-align: center;">	
		        <h2>جدیدترین محصولات</h2>
        <div>
            <?php   $new=mysqli_query($db,"select * from products order by id desc limit 3");
            while ($rowNew=mysqli_fetch_array($new)){ ?>
                <div style="display: inline-block;direction: rtl;text-align: right;margin-top: 8px;">
                    <div class="card" style="width: 16rem;">
                        <img src="<?php $pic=$rowNew['product_image'];
                        $img=substr($pic,3);
                        echo $img;?>" alt="<?php echo $rowNew['product_name'];?>">
                        <div class="card-body">
                            <p class="card-title">نام محصول:<?php echo $rowNew['product_name'];?></p>
                            <p class="card-text">قیمت محصول:<?php echo $rowNew['product_price'];?></p>
                            <a href="product-desc.php?pid=<?php echo $rowNew['id']; ?>" class="btn btn-danger">جزعیات بیشتر</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
	
		<hr>
		    <div class="row" style="text-align: center;" >
        <div>
<!--			all products-->
			<h1>تمام محصولات</h1>
            <?php while ($row=mysqli_fetch_array($pro)){ ?>
			
                <div style="display: inline-block;direction: rtl;text-align: right;margin-top: 8px;">
                    <div class="card" style="width: 16rem;">
                        <img src="<?php $pic=$row['product_image'];
                        $img=substr($pic,3);
                        echo $img;?>" 
							 alt="<?php echo $row['product_name'];?>">
                        <div class="card-body">
                            <p class="card-title">نام محصول:<?php echo $row['product_name'];?></p>
                            <p class="card-text">قیمت محصول:<?php echo $row['product_price'];?></p>
                            <a href="product-desc.php?pid=<?php echo $row['id']; ?>" class="btn btn-danger">جزعیات بیشتر</a>
                        </div>
                    </div>
					<br>
                </div>
            <?php } ?>
        </div>

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
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>