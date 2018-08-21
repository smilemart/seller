<?php
include "config.php"; //데이터베이스 연결 설정파일
include "util.php"; //유틸 함수

$connect = dbconnect($host,$dbid,$dbpass,$dbname);

$id = $_POST['seller_id'];
$pw = $_POST['seller_pw'];

$mem_ret = mysqli_query($connect, "select * from Sellers where seller_id = '$id'");
$mem_num = mysqli_num_rows($mem_ret);

if(!$mem_num) // id로 검색된 회원이 없을 경우
{
	msg('잘못된 아이디 입니다!');
} else
{
	$mem_array = mysqli_fetch_array($mem_ret);

	$db_seller_owned_store = $mem_array[seller_owned_store];
	$db_pw = $mem_array[seller_pw];
	$db_role = $mem_array[seller_authenticated];
	$db_store_no = $mem_array[store_no];
	if($db_pw == $pw)
	{
		SetCookie("cookie_id", $id,0,"/"); // 0 : browser lifetime – 0 or omitted : end of session
		SetCookie("cookie_seller_owned", $db_seller_owned_store,0, "/");
		SetCookie("cookie_role", $db_role,0, "/");
		SetCookie("cookie_store_no", $db_store_no,0, "/");
		echo "<meta http-equiv='refresh' content='0;url=main.php'>";
	}
	else
	{
	msg('잘못된 패스워드 입니다!');
	}
}

mysql_close($connect);
?>