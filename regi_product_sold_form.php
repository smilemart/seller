<?php 
	include "nav_side.php";
	
	$conn = dbconnect($host, $dbid, $dbpass, $dbname);

	$regi_no = $_GET["regi_no"];
    $query =  "select * from Registered where regi_no = $regi_no";
    $res = mysqli_query($conn, $query);
    $regi = mysqli_fetch_array($res);
?>

<div class="main">
	<div class="property w3-container">
<!-- 여기부터 작업하시면 됨.-->
	<p>할인 상품 판매 등록</p>
	<h6>판매된 상품을 등록합니다.</h6>
    </div>

    <div class="w3-container">
        <form name="product_form" action="regi_product_sold.php" method="post">
            <input type="hidden" name="regi_no" value="<?=$regi['regi_no']?>"/>
            <input type="hidden" name="regi_quantity" value="<?=$regi['regi_quantity']?>"/>
            <input type="hidden" name="store_no" value="<?=$regi['store_no']?>"/>
            <p>
                <label class="w3-text" for="regi_name">상품명</label>
                <input class="w3-input w3-border" type="text" placeholder="상품명을 입력해주세요" id="regi_name" 
                name="regi_name" value="<?=$regi['regi_no']?>" disabled/>
            </p>
            <p>
                <label for="regi_class_namee">품목</label>
                <select disabled class="w3-select w3-border" id="regi_class_name" name="regi_class_name">
                    <option value="regi_class_name"><?=$regi['regi_class_name']?></option>
                </select>
            </p>
            <p>
                <label class="w3-text" for="regi_expired_time">유통기한</label>
                <input disabled class="w3-input w3-border" type="datetime-local" placeholder="유통기한을 입력해주세요"
                     id="regi_expired_time" name="regi_expired_time" value="<?=$regi['regi_expired_time']?>"/>
            </p>
            <p>
                <label class="w3-text" for="regi_origin_price">원래 가격</label>
                <input disabled class="w3-input w3-border" type="text" placeholder="1 이상 정수로 입력해주세요" id="regi_origin_price" 
                name="regi_origin_price" value="<?=$regi['regi_origin_price']?>"/>
            </p>
            <p>
                <label class="w3-text" for="regi_price">할인 가격</label>
                <input disabled class="w3-input w3-border" type="text" placeholder="1 이상 정수로 입력해주세요" id="regi_price" 
                name="regi_price" value="<?=$regi['regi_price']?>"/>
            </p>
            <p>
                <label class="w3-text" for="sold_quantity">판매된 수량</label>
                <input class="w3-input w3-border" type="text" placeholder="<?=$regi['regi_quantity']?> 이하의 양의 정수로 입력해주세요"
                 id="sold_quantity" name="sold_quantity"/>
            </p>

            <div class="w3-center" style="margin-top:20px">
                <button class="w3-button w3-round-large w3-large w3-green" 
                    onclick="javascript:return validate();">등록</button>
            </div>

            <script>
                function validate() {
                    else if(document.getElementById("sold_quantity").value < 1) {
                        alert ("수량을 1 이상의 정수로 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
       </div>

</body>
</html>