<?php
function dbconnect($host, $id, $pass, $db)  //데이터베이스 연결
{
    $conn = mysqli_connect($host, $id, $pass, $db);
	mysqli_set_charset($conn, 'utf8mb4'); 
    if ($conn == false) {
        die('Not connected : ' . mysqli_error());
    }

    return $conn;
}

function msg($msg) // 경고 메시지 출력 후 이전 페이지로 이동
{
    echo "
        <script>
             window.alert('$msg');
             history.go(-1);
        </script>";
    exit;
}

function s_msg($msg) //일반 메시지 출력
{
    echo "
        <script>
            window.alert('$msg');
        </script>";
}

function check_pass($pass,$c_pass) //패스워드 일치 여부 검사
{
	$ret = strcmp($pass,$c_pass);
	return $ret;
}

function return_number($string){ //문자열 중 숫자만 추출
     return preg_replace("/[^0-9]*/s", "", $string);
  }
?>