<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

	$regi_no = $_POST['regi_no'];	
    $query =  "select * from Registered where regi_no = $regi_no";
    $res = mysqli_query($conn, $query);
    $regi = mysqli_fetch_array($res);


$regi_name = $regi['regi_name'];
$regi_price = $regi['regi_price'];
$regi_expired_time = $regi['regi_expired_time'];
$regi_origin_price = $regi['regi_origin_price'];
$regi_quantity = $_POST['regi_quantity'];
$store_no = $regi['store_no'];

$sold_quantity = $_POST['sold_quantity'];

$new_regi_quantity = $regi_quantity - $sold_quantity;


echo('<pre>'); print_r($_POST); echo('</pre>');
var_dump($new_regi_quantity);

if($new_regi_quantity < 0){
    msg('현재 수량보다 적은 값을 입력해주세요.');
} elseif($new_regi_quantity == 0) {
    $ret1 = mysqli_query($conn, "insert into Sold (sold_name, sold_quantity, sold_price, sold_origin_price, sold_datetime, store_no) 
	values ('$regi_name', $sold_quantity, $regi_price, $regi_origin_price, NOW(), $store_no");
    if(!$ret1){
        msg('Query Error : '.mysqli_error($conn));
    } else{
        $ret2 = mysqli_query($conn, "delete from Registered where regi_no = $regi_no");
        if(!$ret2){
            msg('Query Error : '.mysqli_error($conn));
        } else{
            s_msg ('성공적으로 반영되었습니다');
            echo "<meta http-equiv='refresh' content='0;url=sold_product_list.php'>";
        }
    } 
} else { // $regi_quantity > $sold_quantity
    $ret1 = mysqli_query($conn, "insert into Sold
    (sold_name, sold_quantity, sold_price, sold_origin_price, sold_datetime, store_no) 
    values ('$regi_name', $sold_quantity, $regi_price, $regi_origin_price, NOW(), $store_no)");
    if(!$ret1){
        msg('Query Error : '.mysqli_error($conn));
    }else{
        $ret2 = mysqli_query($conn, "update Registered 
        set regi_quantity = $new_regi_quantity where regi_no = $regi_no");
        if(!$ret2){
            msg('Query Error : '.mysqli_error($conn));
        } else{
            s_msg ('성공적으로 반영되었습니다');
            echo "<meta http-equiv='refresh' content='0;url=sold_product_list.php'>";
        }
    } 
}
?>

