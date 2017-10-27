<?php 

	session_start();

	unset($_SESSION['userid']);
	unset($_SESSION['username']);
	unset($_SESSION['usernick']);
	unset($_SESSION['userlevel']);

	//세션지웠으면..다시 index.php
	echo("
		<script>
			location.href='../index.php';
		</script>
		");

 ?>