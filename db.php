<?php	
    
    $db_host = 'localhost';
	$db_user = 'root';
	$db_pwd = '';
	$db_name = 'user_track';
	
	$con = mysql_connect($db_host,$db_user,$db_pwd);
	mysql_select_db($db_name,$con);
	
?>