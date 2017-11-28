<?php
	include 'dbUtils.php';

	include 'header.php'; 
	$activePage = "CINEMA";
	include 'navbar.php';
	showImageList();
	include 'footer.php';


	function showImageList() {
		echo "<div class='container main-background'><div class='my-4'><h1 class='display-5'>Cinema</h1></div>";
	  	$result = getMovieList();
	  	echo "<ul class='list-group'>";
		foreach($result as $row){
			echo "<video controls src='api/getVideo.php?id=",$row["id"],"'></video>";	
		}
		echo "</ul><br></div>";
	}
?>
