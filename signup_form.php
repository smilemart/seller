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
	
		<script src="js/modernizr.custom.js"></script>
		<style>
			table.type04 tr {
				height: 60px;
			}
			table.type04 th {
				text-align: right;
				padding-right: 20px;
				width: auto;
				white-space: nowrap;
			}
			table.type04 .w3-input{
				width: 80%;
			}
			
		</style>
	</head>
	<body>
		<div class="container daehan">
			<!-- Codrops top bar -->

			<header class="clearfix daehan">
				<h1><b><a href='index.html'>KU ELEVEN</a></b><span>유통기한 제품에 대한 부담을 줄여드리겠습니다.</span></h1>
			</header>
			<div class="main">
                <div align="center" style="margin-bottom:30px"><span class="margMenu style1"><h3><b>회 원 등 록</b></h3></span></div>
                <form action="signup_confirm.php" method="post">
                <table class='type04' style="height:300px; padding-left:100px;" >
                  <tr><th width="500" scope="row">ID<sup>*</sup></th>
                  <td width="900"><input class="w3-input" type="text" id="txt_ID" name="txt_ID"/></td></tr>
                  <tr><th scope="row">Password<sup>*</sup></th>
                  <td><input class="w3-input" type="password" id="passwd" name="passwd"/></td></tr>
                  <tr><th scope="row">Password 확인<sup>*</sup></th>
                  <td><input class="w3-input" type="password" id="c_passwd" name="c_passwd"/></td></tr>
                  <tr> <th scope="row">이름<sup>*</sup></th>
                  <td><input class="w3-input" type="text" name="txt_name"/></td></tr>
                  <tr><th scope="row">Email Address<sup>*</sup></th>
                  <td><input class="w3-input" type="text" name="txt_email"/></td></tr>
                  <tr><th scope="row">점포 위치<sup>*</sup></th>
                  <td><input class="w3-input" type="text" name="store_location"/></td></tr>
                  <tr><th scope="row">점포 전화번호<sup>*</sup></th>
                  <td><input class="w3-input" type="text" name="store_phonenum"/></td></tr>
                </table>
                <label>
                  <div align="center">
                    <button class="w3-button w3-white w3-large" onclick="javascript:return validate();">가입하기</button>
                  </div>
                </label>
                <script>
        	function validate() {
            	if(document.getElementById("txt_ID").value == "") {
                	alert ("ID를 입력해 주십시오."); return false;
				}
                else if(document.getElementById("passwd").value == "") {
                	alert ("비밀번호를 입력해 주십시오."); return false;
                }
                else if(document.getElementById("c_passwd").value == ""){
                    alert ("비밀번호 확인을 입력해 주십시오.")
                }
                else if(document.getElementById("txt_name").value == "") {
                	alert ("이름을 입력해 주십시오"); return false;
                }
                else if(document.getElementById("txt_email").value == "") {
                	alert ("Email을 입력해 주십시오"); return false;
                }
                else if(document.getElementById("store_location").value == "") {
                	alert ("점포 위치를 입력해 주십시오"); return false;
                }
                else if(document.getElementById("store_phonenum").value == "") {
                	alert ("점포 전화번호를 입력해 주십시오"); return false;
                }
                    return true;
                }
            </script>
		</form>
	</div>
	</body>
</html>
