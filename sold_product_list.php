<?php include "nav_side.php"?>

<div class="main">
  <div class="property w3-container">
   <?php
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
	$query = "select * from Sold where store_no = $_COOKIE[cookie_store_no]";
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
    <p>판매 내역</p>
    <h6>KU-Eleven을 통해 판매한 내역을 확인할 수 있습니다.</h6>
  </div>
  <div class="w3-container">
  <div class="table100 ver4 m-b-110">
		<div class="table100-head">
			<table>
				<thead>
					<tr class="row100 head">
                     	<th class="cell100 column0 thfont">No.</th>
                        <th class="cell100 column1 thfont">상품명</th>
						<th class="cell100 column2 thfont">판매일시</th>
						<th class="cell100 column3 thfont">판매가격</th>
						<th class="cell100 column4 thfont">수량</th>
						<th class="cell100 column5 thfont">기능</th>
					</tr>
				</thead>
			</table>
		</div>

<!--테이블1 데이터-->
		<div class="table100-body">
			<table>
				<tbody>
		<?php
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td class=\"cell100 column0\">{$row_index}</td>";
            echo "<td class=\"cell100 column1\">{$row['sold_name']}</td>";
            echo "<td class=\"cell100 column2\">{$row['sold_datetime']}</td>";
            echo "<td class=\"cell100 column3\">{$row['sold_price']}</td>";
			echo "<td class=\"cell100 column4\">{$row['sold_quantity']}</td>";
            echo "<td class=\"cell100 column5\">
                 <button onclick='javascript:deleteConfirm({$row['sold_no']})' class='w3-button w3-red'>삭제</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
                          
				</tbody>
			</table>
		<script>
        function deleteConfirm(sold_no) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "sold_product_delete.php?regi_no=" + sold_no;
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