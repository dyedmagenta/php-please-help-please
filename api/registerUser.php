<?php
include "../dbUtils.php";

$username = $_POST["name"];
$password = $_POST["password"];
$response = addUser($username, $password);
http_response_code($response);
redirect("/login.php");
?>
