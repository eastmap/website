<?php 
	session_start();

	//회원가입을 통해 저장되어 있는 세션값.
	$userid= $_SESSION['userid'];
	$usernick= $_SESSION['usernick'];
	$userlevel= $_SESSION['userlevel'];
	$username= $_SESSION['username'];

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>정보수정</title>

 	<!-- 공통 css 적용 -->
 	<link rel="stylesheet" type="text/css" href="../css/common.css">
 	<!-- 회원가입 전용 css 적용 -->
 	<link rel="stylesheet" type="text/css" href="../css/member.css">

 	<!-- javascript -->
 	<script type="text/javascript">
 		// 아이디 중복확인
 		function checkId(){
 			// 사용자 입력한 '아이디'값 얻어오기
 			var userid= document.member_form.id.value;
 			// DB(member테이블)에 같은 아이디가 있는지 확인
 			// 그 결과를 작은 새로운 윈도우에 띄우기.
 			open("checkId.php?id="+userid, "아이디체크", "width=300, height=100, left=200, top=100");

 			//checkID.php는 저장작업 후 제작..
 		}

 		// 닉네임 중복확인
 		function checkNick(){
 			// 사용자 입력한 '닉네임'값 얻어오기
 			var usernick= document.member_form.nick.value;
 			// DB(member테이블)에 같은 닉네임이 있는지 확인
 			// 그 결과를 작은 새로운 윈도우에 띄우기.
 			open("checkNick.php?nick="+usernick, "닉네임체크", "width=300, height=100, left=200, top=100");
 		}

 		// submit 버튼
 		function joinSubmit(){
 			//아이디 칸이 비어 있는가?
 			if( !document.member_form.id.value){
 				alert("아이디 입력하세요.");
 				//아이디 칸으로 커서 자동 이동.
 				document.member_form.id.focus();
 				//submit안되도록 이 함수 작업 종료.
 				return;
 			}

 			// 패스워드 칸 확인
 			if( !document.member_form.pass.value){
 				alert("패스워드를 입력하세요.");
 				document.member_form.pass.focus();
 				return;
 			}

 			// 패스워드 확인칸...
 			if( !document.member_form.pass_confirm.value){
 				alert("패스워드확인칸을 입력하세요.");
 				document.member_form.pass_confirm.focus();
 				return;
 			}

 			//이름 칸이 비어있는가?
 			if( !document.member_form.name.value){
 				alert("이름을 입력하세요.");
 				document.member_form.name.focus();
 				return;
 			}

 			//휴대폰 칸..
 			if( !document.member_form.hp2.value || !document.member_form.hp3.value){
 				alert("휴대폰을 입력하세요.");
 				document.member_form.hp1.focus();
 				return;
 			}

 			// 비밀번호와 비번확인칸이 같은 값인지??
 			if( document.member_form.pass.value != document.member_form.pass_confirm.value){
 				alert("비밀번호를 다시 확인하세요.");
 				document.member_form.pass_confirm.focus();
 				//이미 써있는 글씨들을 전체 선택..
 				document.member_form.pass_confirm.select();

 				return;
 			}

 			//프로그램으로 submit하기..
 			document.member_form.submit();

 		}

 		// reset 버튼..
 		function joinReset(){
 			document.member_form.id.value="";
 			document.member_form.pass.value="";
 			document.member_form.pass_confirm.value="";
 			document.member_form.name.value="";
 			document.member_form.nick.value="";
 			document.member_form.hp1.value="010";
 			document.member_form.hp2.value="";
 			document.member_form.hp3.value="";
 			document.member_form.email1.value="";
 			document.member_form.email2.value="";

 			//모두 초기화 했다면 커서는 다시 id칸으로.
 			document.member_form.id.focus();
 		}
 	</script>
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

 			<!-- 나머지 콘텐츠 영역 : 회원가입 폼-->
 			<section id="col2">
 				<!-- member테이블에 저장하는 서버측 modify.php로 제출할 form-->
 				<form action="modify.php" method="post" name="member_form">

 					<!-- 회원가입 타이틀 이미지 스타일 -->
 					<div id="title">
 						<img src="../img/title_join.gif">
 					</div>
 					
 					<!-- 타이틀 아래  input영역들.. -->
 					<div id="form_join">
 						<!-- 라벨들 영역 -->
 						<div id="join_labels">
 							<ul>
 								<li>* 아이디</li>
 								<li>* 비밀번호</li>
 								<li>* 비밀번호확인</li>
 								<li>* 이름</li>
 								<li>* 닉네임</li>
 								<li>* 휴대폰</li>
 								<li>&nbsp;&nbsp; 이메일</li>
 							</ul> 							
 						</div>

 						<!-- 로그인되어 있는 회원의 정보 모두 읽기 --> 						
 						<?php 
 							 include "../lib/db_conn.php";

 							 //로그인된 아이디의 값 읽기
 							 $sql= "select * from member where id='$userid'";
 							 $result= mysqli_query($conn, $sql);
 							 $row = mysqli_fetch_array($result);

 							 //id, nick, name, level은 세션에 있으니..
 							 //나머지만 ..
 							 $pass= $row['pass'];
 							 $hp= $row['hp'];
 							 $email= $row['email'];

 							 //hp가 3자리 이이므로..나누기.
 							 $hps= explode("-", $hp);
 							 //이메일도 나누기.
 							 $emails= explode("@", $email);

 							 mysqli_close($conn);
 						 ?>

 						<!-- input들 영역 -->
 						<div id="join_inputs">
 							<ul>
 								<li>
 									<!-- 아이디는 변경불가! -->
 									<input type="text" name="id" style="background-color: #eeeeee;" value="<?echo $userid;?>" readonly>
 								</li>
 								<li><input type="password" name="pass" value="<?= $pass?>"></li>
 								<li><input type="password" name="pass_confirm" value="<?= $pass?>"></li>
 								<li><input type="text" name="name"  value="<?= $username?>"></li>
 								<li>
 									<div id="nick1"><input type="text" name="nick" value="<?= $usernick?>"></div>
 									<div id="nick2"><a href="#"><img src="../img/check_id.gif" onclick="checkNick()"></a></div>
 								</li>
 								<li>
 									<!-- 휴대폰 앞 3자리 번호종류 선택을 콤보박스형태로.. -->
 									<select class="hp" name="hp1">
 										<option value="010" <? if($hps[0]=='010') echo "selected"; ?> >010</option>
 										<option value="011" <? if($hps[0]=='011') echo "selected"; ?> >011</option>
 										<option value="017" <? if($hps[0]=='017') echo "selected"; ?> >017</option> 										
 									</select>
 									 - 
 									<input type="text" name="hp2" class="hp" value="<?= $hps[1]?>">
 									 - 
 									<input type="text" name="hp3" class="hp" value="<?= $hps[2]?>"> 
 								</li>
 								<li>
 									<input type="text" name="email1" id="email1" value="<?= $emails[0]?>"> @ 
 									<input type="text" name="email2" id="email2" value="<?= $emails[1]?>">
 								</li> 								
 							</ul> 							
 						</div>
 						<!-- input들 영역 종료 -->

 						<!-- 이시점부터 float의 영향을 벗어나겠다.. -->
 						<div class="clear"></div>

 						<!-- 안내메세지 영역 -->
 						<div id="join_must"> * 는 필수 입력항목입니다.</div>
 						
 					</div>
 					<!-- div id="form_join" 영역 종료 -->

 					<!-- insert.php로 전송시키는 submit버튼.. -->
 					<div id="join_buttons">
 						<a href="#"><img src="../img/button_save.gif" onclick="joinSubmit()"></a>
 						<a href="#"><img src="../img/button_reset.gif" onclick="joinReset()"></a>
 					</div>
 					
 				</form>
 				
 			</section> 			
 		</div>
 		
 	</div>
 
 </body>
 </html>