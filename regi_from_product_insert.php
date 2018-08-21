<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);
$conn_cu = dbconnect($host,$dbid,$dbpass,$dbname_cu);

$product_no = $_POST['product_no'];
$product_name = $_POST['product_name'];
$class_name = $_POST['class_name'];
$product_price = $_POST['product_price'];
$product_expired_time = return_number($_POST['product_expired_time']);
$product_quantity = $_POST['product_quantity'];

$regi_quantity = $_POST['regi_quantity'];
$regi_price = $_POST['regi_price'];
$store_no = $_POST['store_no'];
echo('<pre>'); print_r($_POST); echo('</pre>');

$new_product_quantity = $product_quantity - $regi_quantity;

if($new_product_quantity < 0){
    msg('현재 수량보다 적은 값을 입력해주세요.');
} elseif ($new_product_quantity == 0){
    $ret1 = mysqli_query($conn, "insert into Registered
    (regi_name, regi_quantity, regi_class_name, regi_price, regi_origin_price, regi_expired_time, store_no) 
     values ('$product_name', $regi_quantity, '$class_name', $regi_price, $product_price, $product_expired_time, $store_no)");
    if(!$ret1){
        msg('Query Error : '.mysqli_error($conn));
    } else{
        $ret2 = mysqli_query($conn_cu, "delete from Products where product_no = $product_no");
        if(!$ret2){
            msg('Query Error : '.mysqli_error($conn_cu));
        } else{
            s_msg ('성공적으로 반영되었습니다');
            echo "<meta http-equiv='refresh' content='0;url=regi_product_list.php'>";
        }
    } 
} else { // $regi_quantity > $sold_quantity
    $ret1 = mysqli_query($conn, "insert into Registered
    (regi_name, regi_quantity, regi_class_name, regi_price, regi_origin_price, regi_expired_time, store_no) 
    values ('$product_name', $regi_quantity, '$class_name', $regi_price, $product_price, $product_expired_time, $store_no)");
    if(!$ret1){
        msg('Query Error : '.mysqli_error($conn));
    }else{
        $ret2 = mysqli_query($conn_cu, "update Products 
        set product_quantity = $new_product_quantity where product_no = $product_no");
        if(!$ret2){
            msg('Query Error : '.mysqli_error($conn_cu));
        } else{
            s_msg ('성공적으로 반영되었습니다');
            echo "<meta http-equiv='refresh' content='0;url=regi_product_list.php'>";
        }
    } 
}
?>
