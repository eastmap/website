<?php 
	session_start();

	//로그인 되었다면 세션값이 존재...
	$userid= $_SESSION['userid'];
	$usernick= $_SESSION['usernick'];
	$userlevel= $_SESSION['userlevel'];
 ?>

 <!-- 페이지 제작 -->
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>낙서장</title>

 	<!-- 공통 스타일 시트 적용. -->
 	<link rel="stylesheet" type="text/css" href="../css/common.css">

 	<!-- 메모장 고유의 스타일 시트.. -->
 	<link rel="stylesheet" type="text/css" href="../css/memo.css">

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

 				<!-- 낙서장 타이틀 이미지 -->
 				<div id="title">
 					<img src="../img/title_memo.gif">
 				</div>

 				<!-- 낙서장 아래 낙서장 글 입력 영역 -->
 				<div id="memo_row1">

	 				<!-- memo테이블에 저장하는 insert.php로 제출할 form요소 -->
	 				<form name="memo_form" method="post" action="insert.php">

	 					<!-- 닉네임 표시 영역 -->
	 					<div id="memo_nick"> ▷ <?= $usernick ?> </div>

	 					<!-- 낙서장 글 작성 영역 -->
	 					<div id="memo1">
	 						<textarea rows="6" cols="90" name="content"></textarea>
	 					</div>

	 					<!-- 서밋용 버튼 -->
	 					<div id="memo2">
	 						<input type="image" src="../img/memo_button.gif">
	 					</div>
	 					
	 				</form>
 					
 				</div>

 				<!-- 낙서글 리스트 영역.. -->
 				<!-- memo테이블에서 저장된 글들을 읽어오기..-->
 				<?php 

 					//테이버 베이스에서 전체글 읽어오기.
 					include "../lib/db_conn.php";

 					//내림차순(최신글 순..)
 					$sql= "select * from memo order by num desc";
 					$result= mysqli_query($conn, $sql);
 					$rowNum= mysqli_num_rows($result);//전체 글 수

 					// 한 화면에 표시될 글의 수.
 					$scale= 5;

 					// 한페이지에 5개씩 표시되므로..
 					// 전체 글수를 기반으로 페이지 수를 계산
 					//(1~5: 1page, 6~10: 2page, 11~15: 3page....)
 					// if( $rowNum%$scale==0){
 					// 	$pageNum= $rowNum/$scale;
 					// }else{
 					// 	$pageNum= floor($rowNum/$scale)+1;
 					// }

 					$pageNum= floor($rowNum/$scale +0.99);
 					if($pageNum==0) $pageNum=1;

 					//현재 페이지 번호..
 					// 이 문서 가장 아래에 페이지번호 표시 영역..
 					// 이때 페이지를 선택하면 get방식으로 그 페이지의
 					//  글 목록을 보여줌..
 					$page= $_GET['page'];

 					//$page에 따라 글목록 시작번호가 결정.
 					//글목록 시작번호..
 					$start= ($page-1)*$scale;

 					for($i= $start; $i<$start+$scale && $i<$rowNum; $i++){
 						//커서를 특정 위치로 이동.
 						mysqli_data_seek($result, $i);

 						//한줄씩 레코드(row)를 읽어오기.
 						$row= mysqli_fetch_array($result);

 						//memo테이블의 필드값들 읽기.
 						$memo_num= $row[num];
 						$memo_id= $row[id];
 						$memo_name= $row[name];
 						$memo_nick= $row[nick];
 						$memo_content= $row[content];
 						$memo_regist_day= $row[regist_day];

 						// content의 내용은 textarea에 입려했음.
 						// 줄바꿈 문자 \n으로 되어 있음.
 						$memo_content= nl2br($memo_content);

 						// 한줄 읽어올  때 마다 출력..
 						// echo..로 처리하기에는 너무 html기능 많음..
 						// 그래서...php영역을 분리..
 				?>

 					<!-- 요기는 html공간.. -->
 					<div id="memo_list_title">
 						<ul>
 							<li id="list_title1"> <?= $memo_num?> </li>
 							<li id="list_title2"> <?= $memo_nick?> </li>
 							<li id="list_title3"> <?= $memo_regist_day?> </li>

 							<!-- 본인글이면 삭제 할 수 있는 버튼 노출.. -->
 							<li id="list_title4">
 								<?php 
 									if($memo_id==$userid || $userid=="admin"){
 										echo "<a href='delete.php?num=$memo_num'>삭제</a>";
 									}
 								 ?>
 							</li>
 						</ul>
 					</div>

 					<!-- 메모글 내용 영역 -->
 					<div id="memo_list_content">
 						<?=$memo_content?>
 					</div>

 					<!-- 각 메모글 마다 덧글... 작업-->


 				<?
 					}

 				 ?>

 				 <!-- 글 목록 리스트가 끝났으니.. -->

 				 <!-- 페이지 번호 영역 -->
 				 <div id="page_num">
 				 	◀ 이전 &nbsp;&nbsp;

 				 	<!-- 사이에 페이지 번호.. -->
 				 	<?php
 				 		for($i=1; $i<=$pageNum; $i++){
 				 			if($page==$i) echo "<strong>&nbsp; $i &nbsp;</strong>";
 				 			else echo "<a href='memo.php?page=$i'>&nbsp; $i &nbsp;</a>";

 				 		}

 				 	?>


 				 	&nbsp;&nbsp; 다음 ▶
 				 	
 				 </div>
 				
 			</section>
 		</div>
 		
 	</div>
 
 </body>
 </html>