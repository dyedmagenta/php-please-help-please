<?php
include '../dbUtils.php';

    function logUserIn($name, $password) {        
        
        $error = 200;
        if (empty($name) || empty($password)) {
            $error = 401;
            logOut();
        } else {

            $isAuthenticated = isUserAuthenticated($name, $password);
                
            if ($isAuthenticated == true) {
                $_SESSION['login_user'] = $name;
            } else {
                $error = 401;
                logOut();
            }
        }
        return $error;
    }

    function logOut() {
        session_unset();
        session_destroy(); 
    }

    function isUserAuthorizedInGroup($userGroupId) {
        
        $error = 200;
        if(empty($_SESSION['login_user'])) {
            $error = 401;
        } else {
            $isAuthorized = isUserInGroup($_SESSION['login_user'], $userGroupId);
            if($isAuthorized == false) {
                $error = 401;
            }
        }
        return $error;
    }

?>