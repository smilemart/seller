<?php 
	include "nav_side.php";
	
	$conn = dbconnect($host, $dbid, $dbpass, $dbname);

	$regi_no = $_GET["regi_no"];
    $query =  "select * from Registered where regi_no = $regi_no";
    $res = mysqli_query($conn, $query);
    $regi = mysqli_fetch_array($res);

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
	<p>판매 상품 수정하기</p>
	<h6>판매상품을 수정합니다.</h6>
    </div>

    <div class="w3-container">
        <form name="product_form" action="regi_product_modify.php" method="post">
            <input type="hidden" name="regi_no" value="<?=$regi['regi_no']?>"/>
            <p>
                <label class="w3-text" for="regi_name">상품명</label>
                <input class="w3-input w3-border" type="text" placeholder="상품명을 입력해주세요" id="regi_name" 
                name="regi_name" value="<?=$regi['regi_name']?>"/>
            </p>
            <p>
                <label for="regi_class_namee">품목</label>
                <select class="w3-select w3-border" id="regi_class_name" name="regi_class_name">
                    <option value="-1">선택해 주십시오.</option>
                        <?php
                            foreach($classes as $id => $name) {
                                if($id == $regi['regi_class_name']){
                                    echo "<option value='{$id}' selected>{$name}</option>";
                                } else {
                                    echo "<option value='{$id}'>{$name}</option>";
                                }
                            }
                        ?>
                </select>
            </p>
            <p>
                <label class="w3-text" for="regi_expired_time">유통기한</label>
                <input class="w3-input w3-border" type="datetime-local" placeholder="유통기한을 입력해주세요"
                     id="regi_expired_time" name="regi_expired_time" value="<?=$regi['regi_expired_time']?>"/>
            </p>
            <p>
                <label class="w3-text" for="regi_origin_price">원래 가격</label>
                <input class="w3-input w3-border" type="text" placeholder="1 이상 정수로 입력해주세요" id="regi_origin_price" 
                name="regi_origin_price" value="<?=$regi['regi_origin_price']?>"/>
            </p>
            <p>
                <label class="w3-text" for="regi_price">할인 가격</label>
                <input class="w3-input w3-border" type="text" placeholder="1 이상 정수로 입력해주세요" id="regi_price" 
                name="regi_price" value="<?=$regi['regi_price']?>"/>
            </p>
            <p>
                <label class="w3-text" for="regi_quantity">수량</label>
                <input class="w3-input w3-border" type="text" id="regi_quantity" 
                name="regi_quantity" value="<?=$regi['regi_quantity']?>"/>
            </p>

            <div class="w3-center" style="margin-top:20px">
                <button class="w3-button w3-round-large w3-large w3-purple" 
                    onclick="javascript:return validate();">수정</button>
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