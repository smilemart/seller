<?php 
	include "nav_side.php"
?>

<div class="main">
  <div class="property w3-container">
  <?php
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
	$query = "select * from Free where store_no = $_COOKIE[cookie_store_no]";
	$res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>
    <style>
    	.row100 .freecol0{
    		width:5%;
    	}
       	.row100 .freecol1{
    		width:25%;
    	}
       	.row100 .freecol2{
    		width:30%;
    	}
    	.row100 .freecol3{
    		width:27%;
    	}
    	.row100 .freecol4{
    		width:25%;
    	}
    </style>
<!-- 여기부터 작업하시면 됨.-->
    <p>증정 대기 상품</p>
    <h6>KU-Eleven을 통해 증정 대기중인 상품을 확인할 수 있습니다.</h6>
  </div>
  <div class="w3-container">
  <div class="table100 ver4 m-b-110">
		<div class="table100-head">
			<table>
				<thead>
					<tr class="row100 head">
                     	<th class="cell100 freecol0 thfont">No.</th>
                        <th class="cell100 freecol1 thfont">상품명</th>
						<th class="cell100 freecol2 thfont">등록일시</th>
						<th class="cell100 freecol3 thfont">유통기한</th>
						<th class="cell100 freecol4 thfont">기능</th>
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
            echo "<tr class=\"row100\">";
            echo "<td class=\"cell100 freecol0\">{$row_index}</td>";
            echo "<td class=\"cell100 freecol1\">{$row['free_name']}</td>";
            echo "<td class=\"cell100 freecol2\">{$row['free_addedtime']}</td>";
            echo "<td class=\"cell100 freecol3\">{$row['free_expired_time']}</td>";
            echo "<td class=\"cell100 freecol4\">
                 <button onclick='javascript:deleteConfirm({$row['free_no']})' class='w3-button w3-red'>삭제</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
				</tbody>
			</table>
			 <script>
        function deleteConfirm(free_no) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "free_product_delete.php?free_no=" + free_no;
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