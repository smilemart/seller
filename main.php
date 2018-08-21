<?php /*기존 파일
<?php include "nav_side.php"?>

<div class="main">
  <div class="property w3-container">
<!-- 여기부터 작업하시면 됨.-->
    <p>Dropdown Menu inside a Navigation Bar</p>
  </div>
<p>Hover over the "Dropdown" link to see the dropdown menu.</p>
<p>Some text some text some text some text..</p>
  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, </p>
<!-- 여기까지 작업하시면 됨.-->
</div>

</body>
</html>
*/?>

<?php include "nav_side.php"?>
<head>
  <style>
  h1 {
    text-decoration:underline overline;

  }
    </style>
</head>
<body>
<div class="main">
  <div class="property w3-container">
<!-- 여기부터 작업하시면 됨.-->
    <h1 style="padding-left:200px;" ><b>폐기물 처리비용을 해결해 드립니다</b></h1>
  </div>
  <article>
	       <?php switch($_COOKIE[cookie_role]){
	        case 0: $role = '준회원'; break;
	        case 1: $role = '정회원'; break;}
	        
	        if($_COOKIE[cookie_role] == 0)
			{
				echo "<p><h10>$role</h10><b> $_COOKIE[cookie_id]님! <br>
				KU Eleven은 인증된 편의점만이 상품을 등록할 수 있습니다.<br>
				관리자가 인증을 마칠 때까지 조금만 더 기다려주세요.<br>
				정회원이 된다면 상품을 등록하여 유통기한이 얼마 남지 않은 상품을 저렴하게 판매할 수 있습니다.</br>
        		폐기식품이 되어가는 식품들을 미끼상품으로 이용해보세요!</p>";
			} else{
				echo "<p><h10>$role</h10><b> $_COOKIE[cookie_id]님! <br>
				KU Eleven에 상품을 등록하여 유통기한이 얼마 남지 않은 상품을 저렴하게 판매할 수 있습니다.</br>
        		폐기식품이 되어가는 식품들을 미끼상품으로 이용해보세요!</p>";
			}
			?>
	        
<img src='img/headline.png' style="padding-top:100px; padding-bottom:20px;">
<img src='img/headline2.png' style="padding-top:20px; padding-bottom:20px;">
<img src='img/headline6.png' style="padding-top:20px; padding-bottom:20px;">
<img src='img/headline3.png' style="padding-top:20px; padding-bottom:20px;"><br>
<img src='img/headline4.png' style="padding-top:20px; padding-bottom:20px;">
<img src='img/headline5.png' style="padding-top:20px; padding-bottom:20px;">
<!-- 여기까지 작업하시면 됨.-->
</article>

</body>
</html>