<?php 


	
	//php의 버전이 5.6 미만일때..에서만 동작..
	//$conn= mysql_connect('localhost','aaaa','1234');

	// if( phpversion() >= '5.6' ){
	// 	$conn= mysqli_connect('localhost', 'aaaa', '1234', 'site_db');
	// }else{
	// 	$conn= mysql_connect('localhost','aaaa','1234');
	// 	mysql_select_db('site_db', $conn);
	// }

	//하위버전도 호환성의 보유하고 있음.
	$conn= mysqli_connect('localhost', 'aaaa', '1234', 'site_db');



 ?>