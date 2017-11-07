<?php
  include '../dbUtils.php';
  
  $id = $_GET['id'];
  // do some validation here to ensure id is safe

  $image = getImage($id); 
  header("Content-type: image/jpeg");
  echo $image['data'];
?>