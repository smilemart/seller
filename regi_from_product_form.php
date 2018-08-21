<?php 
	include "nav_side.php";
    
    $conn_cu = dbconnect($host, $dbid, $dbpass, $dbname_cu);
    $product_no = $_GET["product_no"];
    $query =  "select * from Products where product_no = $product_no";
    $res = mysqli_query($conn_cu, $query);
    $product = mysqli_fetch_array($res);

	$conn = dbconnect($host, $dbid, $dbpass, $dbname);
    
    $classes = array();
	$query = "select * from Classes";
	$res = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($res)) {
    	$classes[$row['class_name']] = $row['class_name'];
}
?>

<div class="main">
	<div class="property w3-container">
<!-- 여기부터 작업하시면 됨.-->
	<p>판매 상품 등록하기</p>
	<h6>판매 상품을 등록합니다.</h6>
    </div>

    <div class="w3-container">
        <form name="product_form" action="regi_from_product_insert.php" method="post">
            <input type="hidden" name="product_no" value="<?=$product['product_no']?>"/>
            <input type="hidden" name="product_quantity" value="<?=$product['product_quantity']?>"/>
            <input type="hidden" name="store_no" value="<?=$_COOKIE['cookie_store_no']?>"/>
            <p>
                <label class="w3-text" for="product_name">상품명</label>
                <input class="w3-input w3-border" type="text" placeholder="상품명을 입력해주세요" id="product_name" 
                name="product_name" value="<?=$product['product_name']?>"/>
            </p>
            <p>
                <label for="regi_class_name">품목</label>
                <select class="w3-select w3-border" id="regi_class_name" name="class_name">
                    <option value="-1">선택해 주십시오.</option>
                        <?php
                            foreach($classes as $id => $name) {
                                if($id == $product['class_name']){
                                    echo "<option value='{$id}' selected>{$name}</option>";
                                } else {
                                    echo "<option value='{$id}'>{$name}</option>";
                                }
                            }
                        ?>
                </select>
            </p>
            <p>
                <label class="w3-text" for="product_expired_time">유통기한</label>
                <input class="w3-input w3-border" type="datetime-local" placeholder="유통기한을 입력해주세요"
                     id="product_expired_time" name="product_expired_time" value="<?=$product['product_expired_time']?>"/>
            </p>
            <p>
                <label class="w3-text" for="product_price">원래 가격</label>
                <input class="w3-input w3-border" type="text" placeholder="1 이상 정수로 입력해주세요" id="product_price" 
                name="product_price" value="<?=$product['product_price']?>"/>
            </p>
            <p>
                <label class="w3-text" for="regi_price">할인 가격</label>
                <input class="w3-input w3-border" type="text" placeholder="1 이상 정수로 입력해주세요" id="regi_price" 
                name="regi_price"/>
            </p>
            <p>
                <label class="w3-text" for="product_quantity">수량</label>
                <input class="w3-input w3-border" type="text" id="regi_quantity" 
                name="regi_quantity" value="<?=$product['product_quantity']?>"/>
            </p>

            <div class="w3-center" style="margin-top:20px">
                <button class="w3-button w3-round-large w3-large w3-green" 
                    onclick="javascript:return validate();">등록</button>
            </div>

            <script>
                function validate() {
                    if(document.getElementById("regi_class_name").value == "-1") {
                        alert ("품목을 선택해 주십시오"); return false;
                    }
                    else if(document.getElementById("regi_name").value == "") {
                        alert ("상품명을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("regi_expired_time").value == "") {
                        alert ("유통기한을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("regi_origin_price").value < 1) {
                        alert ("원래 가격을 1 이상의 정수로 입력해 주십시오"); return false;
                    } 
                    else if(document.getElementById("regi_price").value < 1) {
                        alert ("할인 가격을 1 이상의 정수로 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("regi_quantity").value < 1) {
                        alert ("수량을 1 이상의 정수로 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
       </div>

</body>
</html>