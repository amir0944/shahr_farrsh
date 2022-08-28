<?php
require_once 'databasse.php';
if (!isset($_SESSION['user'])){
    header("Location: login.php");
    die();
}
$pro=mysqli_query($db,"select * from products");

$user_ip=$_SERVER['REMOTE_ADDR'];
$cart=mysqli_query($db,"select * from cart where User_ip='$user_ip'");
$pay=mysqli_query($db,"select * from cart where User_ip='$user_ip'");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="asset/css/index.css">
</head>
<body>
<div class="container-fluid">
    <!--menu-->
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
    <!--container-->
        <div style="background-image: linear-gradient(red 0%,rgb(39, 39, 39)50%);color: white;" >

            <?php if (mysqli_num_rows($cart)==0){ ?>
                <h2>سبد خرید شما خالی است</h2>
            <?php }
            if (mysqli_num_rows($cart)>0){
            ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>نام محصول</th>
                    <th>قیمت محصول</th>
                    <th>تعداد محصول</th>
                    <th>حذف محصول</th>
                </tr>
                </thead>
                <tbody style="color: white;">
                <?php while ($get_name=mysqli_fetch_array($cart)){
                    $pid=$get_name['product_id'];
                    $product=mysqli_query($db,"select * from products where id='$pid'");
                    $getPname=mysqli_fetch_array($product);
                ?>
                <tr>
                    <td><?php echo $getPname['product_name'];?></td>
                    <td><?php echo $getPname['product_price'];?></td>
                    <td><?php $product_count=mysqli_query($db,"select * from cart where product_id='$pid'");
                        $count=mysqli_fetch_array($product_count);
                        echo $count['product_count'];
                    ?>


                    </td>
                    <td><a href="delete-cart.php?product-id=<?php echo $count['product_id'];?>">حذف محصول</a></td>
                </tr>
                <?php } } ?>
					<tr><input type="submit" value="نهایی کردن خرید" name="pay" class="btn btn-dark"></tr>
                </tbody>
            </table>
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

<script src="asset/js/jquery-2.1.1.min.js"></script>
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/bootstrap.bundle.min.js"></script>
</body>
</html>