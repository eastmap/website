<?php 
	session_start();

	//로그인 되었다면 세션값이 존재...
	$userid= $_SESSION['userid'];
	$username= $_SESSION['username'];
	$usernick= $_SESSION['usernick'];
 ?>

<meta charset="utf-8">

<?php 
	// 로그인이 안된 사람은 글 저장 불가..
	if(!$userid){
		echo ("
			<script>
				alert('로그인 후에 이용 가능합니다.');
				histroy.go(-1);
			</script>"
			);
		exit;
	}

	// 글 저장하려면 글 냉용이 전될되어 왔게죠..
	$content= $_POST['content'];

	// 혹시 글의 내용을 입력하지 않았을 수도 있으므로..
	if(!$content){
		echo ("
			<script>
				alert('내용을 입력하세요.');
				histroy.go(-1);
			</script>"
			);
		exit;
	}

	// 글저장 시간 기록.
	$regist_day= date("Y-m-d (H:i)");

	// memo테이블에 접속
	include "../lib/db_conn.php";

	mysqli_query($conn, "set names utf-8");

	// 저장을 위한  insert쿼리문..
	$sql= "insert into memo (id, name, nick, content, regist_day) values('$userid', '$username', '$usernick', '$content', '$regist_day')";

	// 쿼리 요청..
	mysqli_query($conn, $sql);
	mysqli_close($conn);

	// 다시 낙서글 페이지로 이동.
	echo ("
		<script>
			location.href='memo.php';
		</script>
		");



 ?>