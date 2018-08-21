<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$store_no = $_POST['store_no'];
$regi_name = $_POST['regi_name'];
$regi_class_name = $_POST['regi_class_name'];
$regi_expired_time = return_number($_POST['regi_expired_time']);
$regi_origin_price = $_POST['regi_origin_price'];
$regi_price = $_POST['regi_price'];
$regi_quantity = $_POST['regi_quantity'];

if($regi_price == 0){ // 증정 등록
	if($regi_quantity != 1){
		msg('증정 등록은 1개만 가능합니다.');
	}
	$ret = mysqli_query($conn, "insert into Free
	(free_name, free_class_name, free_expired_time, free_origin_price, free_addedtime, store_no) 
	values ('$regi_name', '$regi_class_name', $regi_expired_time, $regi_origin_price, NOW(), $store_no)");
	
	if(!$ret)
	{
	    msg('Query Error : '.mysqli_error($conn));
	}
	else{
	    s_msg ('성공적으로 입력 되었습니다');
	    echo "<meta http-equiv='refresh' content='0;url=free_product_list.php'>";
	}
}else{ //할인 판매 등록

$ret = mysqli_query($conn, "insert into Registered 
(regi_name, regi_class_name, regi_expired_time, regi_origin_price, regi_price, regi_quantity, store_no) 
values ('$regi_name', '$regi_class_name', $regi_expired_time, $regi_origin_price, $regi_price, $regi_quantity, $store_no)");

if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=regi_product_list.php'>";
}}

?>

