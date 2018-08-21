<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>KU ELEVEN</title>
      <meta name="description" content="A tutorial on how to recreate the effect of YouTube's little left side menu. The idea is to slide a little menu icon to the right side while revealing some menu item list beneath. " />
      <meta name="keywords" content="Add keywords" />
      <meta name="author" content="_yourName_ for Codrops" />
      <link rel="shortcut icon" href="../favicon.ico">
      <link rel="stylesheet" type="text/css" href="css1/default.css" />
      <link rel="stylesheet" href="css1/login.css">
      <link rel="stylesheet" href="css/w3.css">
      <link rel="stylesheet" href="css/font.css">
      <style>

      .grid-level-two{
           display: grid;
           grid-template-columns: 3fr 2fr;
           padding: 30px 40px 10px 10px;
         }
         .grid-item {
              padding: 30px;
              font-size: 30px;
              text-align: center;
              
          }
          .grid-item2 {
			font-size: 35px;
			padding-left: 20%;
			line-height:1.5em;
			display:inline-block;
          }
          .grid-item3{
          	font-size: 20px;
          	padding-top: 20px;
          	line-height:2em;
          	padding-right: 50px;
          }

      </style>
      <script src="js/modernizr.custom.js"></script>
   </head>
   <body>
      <div class="container daehan">
         <!-- Codrops top bar -->

        <header class="clearfix">
            <h1><b><a href='#'>KU ELEVEN</a></b><span>유통기한 제품에 대한 부담을 줄여드리겠습니다.</span></h1>
        </header>
        <div class="grid-level-two">
        <div class="grid-item2">
            <h2><p>매일 매일 발생하는<br>유통기한이 지난 식품!    <br> 어떻게 처리할지 고민하십니까?</p></h2>
		</div>
			<div class="grid-item3">
	            <ul>
	               <li text-align:right;>유통기한은 지났지만 섭취기한이 남은 식품을 무료로 사람들에게 나누어 주세요</li>
	               <li>유통기한이 임박한 상품은 할인을 적용해서 이익을 남기세요</li>
	            </ul>
	        </div>
        </div>



         <div class="w3-container" style='padding-top:50px;'>
                     <div class="grid-item">

                        <form class="login-form" action="login_confirm.php" method="post">
                           <input type="text" name="seller_id" placeholder="username"/>
                           <input type="password" name="seller_pw" placeholder="password"/>
                           <button>login</button>
                           <p class="message">Not registered?<a href="signup_form.php">Create an account</a></p>
                        </form>
                     </div>
                  </div>
      </div><!-- /container -->


      <script src="js/ytmenu.js"></script>
   </body>
</html>