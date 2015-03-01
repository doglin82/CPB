<?php
// function to count likes.
include("../../../../wp-load.php");

if(isset($_POST['registration']))$regstration = $_POST['registration']; 
if(isset($_POST['id']))$id= $_POST['id']; 
// Another way to debug/test is to view all cookies

if(!isset($_COOKIE['likebtn_'.$id]))
 { 
 if(isset($id)){
 	setcookie('likebtn_'.$id,'likebtn_'.$id,time() + (86400 * 7)); // 86400 = 1 day
	torque_setPostLikes($id);
	echo torque_getPostLikes($id);
	
 		}  
 } 
 else 
 { 
echo torque_getPostLikes($id);
 } 
 

	
?>