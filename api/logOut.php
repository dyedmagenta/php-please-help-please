<?php
    include "../sessionUtils.php";
    session_start();
    logOut();
    redirect("/login.php");
?>
