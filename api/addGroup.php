<?php 
include "../dbUtils.php";
    session_start();
    $groupName = $_POST['name'];
    $response = 500;
    if(empty($_SESSION['login_user'])) {
        $response = 401;
    } else {
        $response = addUserGroup($groupName, $_SESSION['login_user']);
    }
    http_response_code($response);

?>