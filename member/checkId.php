<meta charset="utf-8">

<?php 

	$id= $_GET['id'];
	//중복확인을 위해 실행되고 있는데..
	//혹시 아이디값이 전달되지 않으면??
	if(!$id){
		echo "아이디를 입력하세요.";
		exit;
	}

	//데이터베이스 접속
	include "../lib/db_conn.php";

	$sql= "select * from member where id='$id'";

	$result= mysqli_query($conn, $sql);
	$rowNum= mysqli_num_rows($result);

	//개수가 0이아니면 이니 아이디가 있다는 것..
	if($rowNum){
		echo "아이디가 중복됩니다.<br/>";
		echo "다른 아이디를 사용하세요.<br/>";
	}else{
		echo "사용가능한 아이디 입니다.";
	}

	mysqli_close($conn);

 ?>