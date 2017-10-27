<?php 
	session_start();
 ?>

<meta charset="utf-8">

<?php 

	//POST 전달된 값.
	$id= $_POST['id'];
	$pass= $_POST['pass'];

	if(!$id){
		//경고창보여주고 이전 페이지(login_form.php)로 다시 이동.
		echo (" 
			<script>
 				alert('아이디를 입력하세요.');
 				history.go(-1);
 			</script>");
		exit;
	}

	if(!$pass){
		//경고창보여주고 이전 페이지(login_form.php)로 다시 이동.
		echo (" 
			<script>
 				alert('비밀번호를 입력하세요.');
 				history.go(-1);
 			</script>");
		exit;
	}


	// 아이디와 비비밀번호가 온전히 전달되었다며...DB (member테이블에서)
	// 비교작업..
	include "../lib/db_conn.php";

	$sql= "select * from member where id='$id' and pass='$pass'";

	//쿼리요청
	$result= mysqli_query($conn, $sql);
	//검색 결과로부터 찾아진 개수(row의 수)를 체크
	$rowNum= mysqli_num_rows($result);

	if(!$rowNum){ //검색결과가 0개라는 것은?? 없는 아이디라는 뜻.
		echo ("
			<script>
				alert('아이디와 비밀번호를 확인하세요.');
				history.go(-1);
			</script>");
		exit;
	}

	//로그인이 되었으니..세션에 멤버의 정로를 저장하기..
	// 멤버 정보 얻어오기.
	$row= mysqli_fetch_array($result); 

	$userid= $row[id];
	$username= $row[name];
	$usernick= $row[nick];
	$userlevel= $row[level];

	//세션 저장..(이 작업전에 session_start())
	$_SESSION['userid']= $userid;
	$_SESSION['username']= $username;
	$_SESSION['usernick']= $usernick;
	$_SESSION['userlevel']= $userlevel;


	//세션저장작업이 끝났으니 페이지를 ...index.php로 이동..
	echo("
		<script>
			location.href='../index.php';
		</script>
		");

 ?>


