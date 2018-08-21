<?php 
	include "nav_side.php";
	
	$connect = dbconnect($host, $dbid, $dbpass, $dbname);

	$classes = array();
	$query = "select * from Classes";
	$res = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($res)) {
    	$classes[$row['class_name']] = $row['class_name'];
}

	if(!$_COOKIE[cookie_store_no]){
		msg('상품 등록은 정회원이 된 후 할 수 있습니다.');
	}
?>

<div class="main">
	<div class="property w3-container">
<!-- 여기부터 작업하시면 됨.-->
	<p>직접 등록하기</p>
	<h6>판매/증정 상품을 직접 등록합니다.<br>
		증정 상품의 수량은 1개만 등록할 수 있습니다.</h6>
    </div>

    <div class="w3-container">
        <form name="product_form" action="regi_product_insert.php" method="post">
            <input type="hidden" name="store_no" value="<?=$_COOKIE[cookie_store_no]?>"/>
            <p>
                <label class="w3-text" for="regi_name">상품명</label>
                <input class="w3-input w3-border" type="text" placeholder="상품명을 입력해주세요" id="regi_name" name="regi_name"/>
            </p>
            <p>
                <label for="regi_class_namee">품목</label>
                <select class="w3-select w3-border" id="regi_class_name" name="regi_class_name">
                    <option value="-1">선택해 주십시오.</option>
                    <?php
                        foreach($classes as $id => $name) {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                    ?>
                </select>
            </p>
            <p>
                <label class="w3-text" for="regi_expired_time">유통기한</label>
                <input class="w3-input w3-border" type="datetime-local" placeholder="유통기한을 입력해주세요"
                     id="regi_expired_time" name="regi_expired_time" value="<?=date("Y-m-d H:i:s")?>"/>
            </p>
            <p>
                <label class="w3-text" for="regi_origin_price">원래 가격</label>
                <input class="w3-input w3-border" type="text" placeholder="정수로 입력" id="regi_origin_price" name="regi_origin_price" />
            </p>
            <p>
                <label class="w3-text" for="regi_price">할인 가격</label>
                <input class="w3-input w3-border" type="text" placeholder="정수로 입력" id="regi_price" name="regi_price"/>
            </p>
            <p>
                <label class="w3-text" for="regi_quantity">수량</label>
                <input class="w3-input w3-border" type="text" placeholder="정수로 입력" id="regi_quantity" name="regi_quantity" />
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
                    else if(document.getElementById("regi_origin_price").value == "") {
                        alert ("원래 가격을 입력해 주십시오"); return false;
                    } 
                    else if(document.getElementById("regi_price").value == "") {
                        alert ("할인 가격을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("regi_quantity").value == "") {
                        alert ("수량을 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
       </div>

</body>
</html>