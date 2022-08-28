<?php
$db=mysqli_connect('127.0.0.1','root','','shop');
mysqli_query($db,"SET NAMES UTF8");
if (!$db){
    echo mysqli_connect_error();
}
session_start();
define('ADMINUSER','admin');
define('PASSWORD','admin');