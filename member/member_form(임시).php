<?php 
session_start();
	//회원가입을 통해 저장되어 있는 세션값
$userid= $_SESSION['userid'];
$usernick= $_SESSION['usernick'];
$userlevel= $_SESSION['userlevel'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>회원가입</title>
	<!-- 공용 css -->
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<!-- member css -->
	<link rel="stylesheet" type="text/css" href="../css/member.css">
	<!-- javascript -->
	<script type="text/javascript">
		// 아이디 중복확인
		function checkId(){

		}

		// 닉네임 중복 확인
		function checkNick(){

		}
		// submit 버튼
		function joinSubmit(){

		}
		// reset 버튼
		function joinReset(){

		}
	</script>
</head>
<body>
	<div id="wrap">
		<header id="header">
			<?php include '../lib/top_login2.php' ?>
		</header>
		<nav id="menu">
			<?php include '../lib/top_menu2.php' ?>

		</nav>
		<div id="content">
			<!-- 왼쪽 사이드 nav메뉴 영역(선택x단순 리스트) : 공통모듈 -->
			<aside id="col1">
				<div id="left_menu">
					<?php include '../lib/left_menu.php' ?>
				</div>
			</aside>
			<!-- 나머지 콘텐츠 영역: 회원가입 폼 -->
			<section id="col2">
				<!-- member테이블에 저장하는 서버측 insert.php로 제출할 form -->
				<form action="insert.php" method="post" name="member_form">
					<!-- 회원가입 타이틀 이미지 스타일 -->
					<div>
						<img src="../img/title_join.gif">
					</div>
					
					<!-- title 아래 input 영역들 -->
					<div id="form_join">
						<!-- 라벨들 영역 -->
						<div id="join_labels">
							<ul>
								<li>* 아이디</li>
								<li>* 비밀번호</li>
								<li>* 비밀번호 확인</li>
								<li>* 이름</li>
								<li>* 닉네임</li>
								<li>* 휴대폰</li>
								<li>&nbsp;&nbsp; 이메일</li>
							</ul>
						</div>

						<!-- input들 영역 -->
						<div id="join_inputs">
							<ul>
								<li>
									<div id="id1">
										<input type="text" name="id">
									</div>
									<div id="id2">
										<a href="#"><img src="../img/check_id.gif" onclick="checkId()"></a>
									</div>
									<div id="id3">
										4-12자의 영문 소문자, 숫자와 특수기호(_)만 사용할 수 있습니다.
									</div>
									
								</li>
								<li>
									<input type="password" name="pass">
								</li>
								<li>
									<input type="password" name="pass_confirm">
								</li>
								<li>
									<input type="text" name="name">
								</li>
								<li>
									<div id='nick1'>
										<input type="text" name="id">
									</div>
									<div id="nick2">
										<a href="#"><img src="../img/check_id.gif" onclick="checkNick()"></a>
									</div>
								</li>
								<li>
									<!-- 휴대폰 앞 3자리 번호종류 선택을 콤보박스 형태로.. -->
									<select class="hp" name="hp1">
										<option value='010'>010</option>
										<option value='011'>011</option>
										<option value='017'>017</option>
									</select>
									-
									<input type="text" name="hp2" class="hp">
									-
									<input type="text" name="hp3" class="hp">
								</li>
								<li>
									<input type="text" name="email1" id="email1">
									@
									<input type="text" name="email2" id='email2'>
								</li>

							</ul>
							
						</div>
						<!-- input영역 종료 -->

						<!-- 이 시점부터 float의 영향을 벗어나겠다. -->
						<div class="clear"></div>

						<!-- 안내메시지 영역 -->
						<div id="join_must">
							* 는 필수 입력항목입니다.
						</div>
					</div>
					<!-- div id='form_join' 영역 종료 -->

					<!-- insert.php로 전송시키는 submit버튼.. -->
					<div id="join_buttons">
						<a href=""><img src="../img/button_save.gif" onclick="joinSubmit()"></a>
						<a href=""><img src="../img/button_reset.gif" onclick="joinReset()"></a>
					</div>
				</form>
				
			</section>
		</div>
	</div>

</body>
</html>