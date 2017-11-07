<?php
include '../dbUtils.php';
$file = $_FILES["data"];
if ($file["error"] == UPLOAD_ERR_OK) {
    
	if($_POST["isPhoto"] == true) {
		$type = "p";
	} else {
		$type = "f";
	}
    if (addFile($_POST["name"], file_get_contents($file["tmp_name"]), $_POST["directory_id"], $type) == true) {
        header("Location: ../gallery.php");
    } else {

        header("Location: index.html?error=ERROR_SQL");
    }
        
}
?>
