<?php
session_start(); 
include_once "db.php";

if($_POST['ajax_status'] == 'form_submit' ){
	

	
//print_r($_POST);
	$name=$_POST['u_name'];
	$pwd=$_POST['pwd'];
	
	$query=mysql_query("select * from login where u_name='".$name."' and pwd='".$pwd."'") ;
	$res=mysql_fetch_row($query);
	
	if($res){
		print "ok";
		$_SESSION['name']=$name;
	}
	else{
		print "no";
	}

	
}

?>