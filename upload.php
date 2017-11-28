<?php
	include 'sessionUtils.php';
	if(!$isUserLogged){
		redirect("login.php");
	}

	include 'header.php';
	$activePage = "UPLOAD";
	include 'navbar.php';
	include 'uploadForm.html';
	include 'footer.php';
?>