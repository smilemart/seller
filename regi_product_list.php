<?php include "nav_side.php"?>

<div class="main">
  <div class="property w3-container">
    <?php
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
	$query = "select * from Registered where store_no = $_COOKIE[cookie_store_no]";
	$res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>
<!-- 여기부터 작업하시면 됨.-->
	<p>판매 중인 상품</p>
	<h6>현재 KU-Eleven에서 판매중인 상품 목록을 확인할 수 있습니다.</h6>
  </div>
  <style>
  	.column00{
    width: 5%;
	}
  .column01 {
    width: 20%;
  }
  
  .column02 {
    width: 20%;
  }
  
  .column03 {
    width: 10%;
  }
  
  .column04 {
    width: 10%;
  }
  
  .column05 {
    width: 10%;
  }
  .column06 {
    width: 20%;
  }
	
	.table100-body .cell100{
		padding-left:10px;
	}
	
  </style>
  <div class="w3-container">
  <div class="table100 ver4 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
                                    <th class="cell100 column00 thfont">No.</th>
                                    <th class="cell100 column01 thfont">상품명</th>
									<th class="cell100 column02 thfont">유통기한</th>
									<th class="cell100 column03 thfont">기존가격</th>
									<th class="cell100 column04 thfont">상품가격</th>
									<th class="cell100 column05 thfont">수량</th>
									<th class="cell100 column06 thfont">기능</th>
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
						            echo "<td class=\"cell100 column00\">{$row_index}</td>";
						            echo "<td class=\"cell100 column01\">{$row['regi_name']}<sup></td>";
						            echo "<td class=\"cell100 column02\">{$row['regi_expired_time']}</td>";
						            echo "<td class=\"cell100 column03\">{$row['regi_origin_price']}</td>";
									echo "<td class=\"cell100 column04\">{$row['regi_price']}</td>";
									echo "<td class=\"cell100 column05\">{$row['regi_quantity']}</td>";
						            echo "<td class=\"cell100 column06\">
						            <a href='regi_product_sold_form.php?regi_no={$row['regi_no']}'><button class='w3-button w3-green'>판매</button></a>
									<a href='product_form_modi.php?regi_no={$row['regi_no']}'><button class='w3-button w3-orange'>수정</button></a>
						                 <button onclick='javascript:deleteConfirm({$row['regi_no']})' class='w3-button w3-red'>삭제</button>
						                </td>";
						            echo "</tr>";
						            $row_index++;
						        }
						        mysqli_close($conn);
						        ?>
							</tbody>
						</table>
						 <script>
        function deleteConfirm(regi_no) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "regi_product_delete.php?regi_no=" + regi_no;
            }else{   //취소
                return;
            }
        }
    </script>
					</div>
				</div>
	<!--테이블1 데이터-->
  </div>
</div>
</body>
</html>