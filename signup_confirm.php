<?php
include "config.php"; //데이터베이스 연결 설정파일
include "util.php"; //유틸 함수

$connect = dbconnect($host,$dbid,$dbpass,$dbname);

$id = $_POST['txt_ID']; // 변수명 = $_POST['이전에 받아온 input의 name']
$pass = $_POST['passwd'];
$c_pass = $_POST['c_passwd'];
$name =  $_POST['txt_name'];
$email = $_POST['txt_email'];
$store_location =  $_POST['store_location'];
$store_phonenum = $_POST['store_phonenum'];

$ret = mysqli_query($connect, "select seller_id from Sellers where seller_id='$id'"); //ID 조사
$num = mysqli_num_rows($ret);

if($num)
{
	msg('이미 존재하는 회원ID입니다!');
}
else if(check_pass($pass,$c_pass)!=0) //PASS 조사
{
	msg('패스워드가 맞지 않습니다!');
}
else{
	$insert_query = "insert into Sellers (seller_id, seller_pw, seller_name, seller_email, seller_owned_store, seller_owned_phone) 
									values ('$id','$pass','$name','$email','$store_location','$store_phonenum')";
	$insert_ret = mysqli_query($connect, $insert_query);

	if(!insert_ret)
	{ msg('DB에 에러가 발생!'); }
	else
	{ s_msg('가입되었습니다');
		echo "<meta http-equiv='refresh' content='0;url=index.php'>"; }
}
mysql_close($connect);
?>