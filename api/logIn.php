<?php
    include "../sessionUtils.php";

    $username = $_POST['name'];
    $password = $_POST['password'];
    $response = logUserIn($username, $password);
    http_response_code($response);
?>