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
 	<title>로그인</title>

 	<!-- 공통 스타일 적용. -->
 	<link rel="stylesheet" type="text/css" href="../css/common.css">

 	<!-- 로그인페이지 전용 스타일 적용. -->
 	<link rel="stylesheet" type="text/css" href="../css/login.css">


 </head>
 <body>

 	<div id="wrap">

 		<header id="header">
 			<?php include "../lib/top_login2.php" ?>
 		</header>

 		<nav id="menu">
 			<?php include "../lib/top_menu2.php" ?>
 		</nav>

 		<div id="content">
 		<!-- 왼쪽 사이드 nav메뉴 영역(선택X단순 리스트) :공통모듈 -->
 			<aside id="col1">
 				<div id="left_menu">
 					<?php include "../lib/left_menu.php" ?>
 				</div> 				
 			</aside>

 			<!-- 나머지 콘텐츠 영역 -->
 			<section id="col2">

 				<form name="login_form" method="post" action="login.php">

 					<div id="title">
 						<img src="../img/title_login.gif">
 					</div>

 					<div id="form_login">
 						<!-- 로그인 안내 메세지.. -->
 						<img src="../img/login_msg.gif" id="login_msg">
 						<!-- 안내메세지에 float속성 영향 없애기.. -->
 						<div class="clear"></div>

 						<!--  자물쇠 이미지 영역-->
 						<div id="login1">
 							<img src="../img/login_key.gif">
 						</div>

 						<!-- 사용자 입력요소 영역 -->
 						<div id="login2">

 							<!-- 라벨/입력/버튼 -->
 							<div id="id_input_button">
 								<!-- 라벨 -->
 								<div id="id_pw_label">
 									<ul>
 										<li><img src="../img/id_title.gif"></li>
 										<li><img src="../img/pw_title.gif"></li>
 									</ul>
 								</div>

 								<!-- 입력 -->
 								<div id="id_pw_input">
 									<ul>
 										<li><input type="text" name="id" class="login_input"></li>
 										<li><input type="password" name="pass" class="login_input"></li>
 									</ul>
 								</div>

 								<!-- 버튼 -->
 								<div id="login_button">
 									<!-- JS로  submit()하는 것은 해봤으니.. -->
 									<!-- 로그인 버튼 클릭시 login.php로 submit할 거라서.. -->
 									<!-- type= "image" 적용.. post전달.. -->
 									<input type="image" src="../img/login_button.gif">
 								</div>
 							</div>


 							<div class="clear"></div>

 							<!-- 회원가입 안내 영역... -->
 							<div id="join_button">
 								<!-- 회원 아닌지 여부 안내 메세지 -->
 								<img src="../img/no_join.gif">

 								<!-- 둘사이에 간견 띄우기. -->
 								&nbsp;&nbsp;&nbsp;&nbsp;

 								<!-- 회원가입페이지 이동 버튼 이미지 -->
 								<a href="../member/member_form.php">
 									<img src="../img/join_button.gif"> 									
 								</a>
 							</div>
 							
 						</div>

 					</div>
 					
 				</form>
 				
 			</section> 			
 		</div>
 		
 	</div>
 
 </body>
 </html>
