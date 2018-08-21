<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/font.css">
<link rel="stylesheet" href="css/w3.css">

</head>
<?php
	include "config.php"; //데이터베이스 연결 설정파일
	include "util.php"; //유틸 함수
	$conn = dbconnect($host, $dbid, $dbpass, $dbname);
	$query = "select * from Stores where store_no = $_COOKIE[cookie_store_no]";
	$res = mysqli_query($conn, $query);
	$store = mysqli_fetch_array($res);
?>
<body>

<div class="navbar">
  <a id='title' class='left' href="main.php">KU-ELEVEN</a>  
  <span>for Seller</span>
  <span style="margin-left:20px; align:center;"><?=$store[store_name]?></span>
  <a class="right" href="logout.php">Logout</a>
</div>

<div class="sidenav daehan">
  <a style="color:black"><b>판매 관리</b></a>
    <ul>
      <li><a href="regi_product_list.php">판매 중인 상품</a></li>
      <li><a href="free_product_list.php">증정 대기 상품</a></li>
      <li><a href="sold_product_list.php">판매 내역</a></li>
    </ul>
  <a style="color:black"><b>상품 등록하기</b></a>
    <ul>
      <li><a href="my_product_list.php">내 상품 목록</a></li>
      <li><a href="product_form.php">직접 등록하기</a></li>
    </ul>
  <a href="contactus.php" style="color:black">Contact</a>
</ul>
</div>
<?php mysqli_close($conn); ?>
