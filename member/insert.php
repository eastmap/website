<?php 

	//한글 인코딩
	header('Content-Type:text/html; charset=utf-8');

	// member_form.php로 부터 post방식으로 전달된 값들 받기..
	$id= $_POST['id'];
	$pass= $_POST['pass'];
	$name= $_POST['name'];
	$nick= $_POST['nick'];
	$hp= $_POST['hp1']."-".$_POST['hp2']."-".$_POST['hp3'];
	$email= $_POST['email1']."@".$_POST['email2'];

	//회원가입 되는 날짜...
	$regist_day= date("Y-m-d (H:i)");
	//회원등급은 무조건 9등급으로..

	//데이터베이스 접근.. site_db : 공통모듈
	include "../lib/db_conn.php";

	//같은 아이디가 있는지 확인..
	$sql= "select * from member where id='$id'";
	
	$result= mysqli_query($conn, $sql);
	$rowNum= mysqli_num_rows($result);

	if($rowNum){
		//rowNum이 0아니면 같은 아이디가 있는 것이니..저장작업X
		echo ("<script>
				alert('해당 아이디가 존재합니다.'');
				history.back();
			  </script>");

		//php 종료
		exit;
	}


	// 같은 아이디 없으니...저장..
	mysqli_query($conn, "set names utf-8");

	$sql= "insert into member (id, pass, name, nick, hp, email, regist_day, level)";
	$sql.= " values('$id','$pass','$name','$nick','$hp','$email','$regist_day', '9')";

	mysqli_query($conn,$sql);
	mysqli_close($conn);

	//insert작업이 종료되면... 페이지를 다시 홈화면으로..
	echo ("
		<script>
			location.href='../index.php';
		</script>
		");

 ?>