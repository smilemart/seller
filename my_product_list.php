<?php include "nav_side.php"?>

<div class="main">
  <div class="property w3-container">
    <?php
    $conn = dbconnect($host, $dbid, $dbpass, $dbname_cu);
	$query = "select * from Products";
	$res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>
     <style>
    	 .column0{
    width: 5%;  
    text-align: center;
	}
  .column1 {
    width: 25%;
	 }
  
  .column2 {
    width: 25%;
	 }
  
  .column3 {
    width: 10%;
  }
  
  .column4 {
    width: 10%;
  }
  
  .column5 {
    width: 10%;
  }
  .table100-body .column3{
  	padding-left:2%;
  }
    .table100-body .column4{
  	padding-left:1%;
  }
    </style>
<!-- 여기부터 작업하시면 됨.-->
    <p>내 상품 목록</p>
	<h6>미등록 상태의 유통기한이 얼마 남지 않은 내 상품 목록을 확인하여 상품을 등록할 수 있습니다.</h6>
  </div>
  <div class="w3-container">
  <div class="table100 ver4 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
                            <tr class="row100 head">
                                <th class="cell100 column0 thfont">No.</th>
                                <th class="cell100 column1 thfont">상품명</th>
                                <th class="cell100 column2 thfont">유통기한</th>
                                <th class="cell100 column3 thfont">기존가격</th>
                                <th class="cell100 column4 thfont">수량</th>
                                <th class="cell100 column5 thfont">기능</th>
					        </tr>
							</thead>
						</table>
					</div>
<!--테이블1 데이터-->
					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								<?php
						        $row_index = 1;
						        while ($row = mysqli_fetch_array($res)) {
						            echo "<tr>";
						            echo "<td class=\"cell100 column0\">{$row_index}</td>";
						            echo "<td class=\"cell100 column1\">{$row['product_name']}<sup></td>";
						            echo "<td class=\"cell100 column2\">{$row['product_expired_time']}</td>";
						            echo "<td class=\"cell100 column3\">{$row['product_price']}</td>";
									echo "<td class=\"cell100 column4\">{$row['product_quantity']}</td>";
						            echo "<td class=\"cell100 column5\">
						            <a href='regi_from_product_form.php?product_no={$row['product_no']}'><button class='w3-button w3-green'>등록</button></a>
						                </td>";
						            echo "</tr>";
						            $row_index++;
						        }
						        mysqli_close($conn);
						        ?>
							</tbody>
						</table>
					</div>
				</div>
	<!--테이블1 데이터-->
  </div>
</div>
</body>
</html>