<?php
	include 'dbUtils.php';

	include 'header.php'; 
	$activePage = "LOGIN";
	include 'navbar.php';
	showLogIn();
    include 'footer.php';

    function showLogIn() {
        echo "<form action='/action_page.php'>
        <div class='container'>
          <label><b>Username</b></label>
          <input type='text' placeholder='Enter Username' name='uname' required>
      
          <label><b>Password</b></label>
          <input type='password' placeholder='Enter Password' name='psw' required>
      
          <button type='submit'>Login</button>
        </div>
      </form>";
    }
    

?>