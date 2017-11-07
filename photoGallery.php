<?php
	include 'dbUtils.php';
	

  	$result = getFileList();

  	echo "<ul class='list-group'>";
	while($row = mysql_fetch_array($result)){
		if($row["type"] === "p") {
			echo "<li class='list-group-item'><span class='txt-gallery'>",$row["name"],"</span><img class='img-gallery' src='getImage.php?id=",$row["id"],"'/></li>";	
		} else {
			echo "<li class='list-group-item'><span class='txt-gallery'>",$row["name"],"</span><img class='img-gallery' src='img/ic_file.png'/></li>";
		}
		
	}
	echo "</ul>";

	
?>
