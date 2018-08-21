<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);


$regi_no = $_POST['regi_no'];
$regi_name = $_POST['regi_name'];
$regi_class_name = $_POST['regi_class_name'];
$regi_quantity = $_POST['regi_quantity'];
$regi_price = $_POST['regi_price'];
$regi_expired_time = return_number($_POST['regi_expired_time']);
$regi_origin_price = $_POST['regi_origin_price'];

$ret = mysqli_query($conn, "update Registered 
    set regi_name = '$regi_name', regi_class_name = '$regi_class_name', 
    regi_quantity = $regi_quantity, regi_price = $regi_price, regi_expired_time = $regi_expired_time,
    regi_origin_price = $regi_origin_price 
    where regi_no = $regi_no");

if(!$ret) {
    msg('Query Error : '.mysqli_error($conn));
} else {
    s_msg('성공적으로 수정되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=regi_product_list.php'>";
}

?>

