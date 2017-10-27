<?php 
	session_start();

	//회원가입을 통해 저장되어 있는 세션값.
	$userid= $_SESSION['userid'];
	$usernick= $_SESSION['usernick'];
	$userlevel= $_SESSION['userlevel'];
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> 루비또 </title>

	<!-- 공통스타일 시트 적용 -->
	<link rel="stylesheet" type="text/css" href="./css/common.css">
</head>
<body>

	<div id="wrap">

		<header id="header">
			<!-- 헤드라인 부분은 모든 페이지에서 -->
			<!-- 공통으로 사용..: 공통모듈...제작 -->
			<!-- 외부 php문서에 내용 제작 후 include -->
			<?php include "./lib/top_login.php"; ?>	
		</header>

		<nav id="menu">
			<!-- 공통모듈 사용하기.. -->
			<?php include "./lib/top_menu.php"; ?>			
		</nav>

		<section id="content">
			<!-- 메인화면 이미지 -->
			<div id="main_img"><img src="./img/main_img.jpg"></div>
		</section>

	</div>

</body>
</html>