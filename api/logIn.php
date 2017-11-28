<?php
    include "../sessionUtils.php";

    session_start();

    $username = $_POST['name'];
    $password = $_POST['password'];
    $response = logUserIn($username, $password);
    http_response_code($response);

?>