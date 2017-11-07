<?php
	include 'dbUtils.php';

	include 'header.php'; 
	$activePage = "GALLERY";
	include 'navbar.php';
	showImageList();
	include 'footer.php';


	function showImageList() {
		echo "<div class='container main-background'><div class='my-4'><h1 class='display-5'>Gallery</h1></div>";
	  	$result = getFileList();
	  	echo "<ul class='list-group'>";
		foreach($result as $row){
			if($row["type"] === "p") {
				echo "<li class='list-group-item' data-id='",$row["id"],"'><span class='txt-gallery'>",$row["name"],"</span><img class='img-gallery' src='api/getImage.php?id=",$row["id"],"'/></li>";	
			} else {
				echo "<li class='list-group-item' data-id='",$row["id"],"''><span class='txt-gallery'>",$row["name"],"</span><img class='img-gallery' src='img/ic_file.png'/></li>";
			}
			
		}
		echo "</ul><br></div>";
	}
?>
