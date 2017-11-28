<?php
	include 'dbUtils.php';
	include 'header.php';
	$activePage = "LOGIN";
	include 'navbar.php';
	showLogIn();
    include 'footer.php';

    function showLogIn() {
        echo "
				<div class='centered'>
				<div class='row>
  				<div class='col-lg-6'>
						<form action='api/logIn.php' method='post'>
			        <div class='input-group'>
								<span class='input-group-addon' id='sizing-addon2' >@</span>
			          <input type='text' name='name' class='form-control' placeholder='Username' aria-describedby='sizing-addon2' required>
								<br>
								<span class='input-group-addon' id='sizing-addon2'>🔒</span>
			          <input type='password' name='password' class='form-control' placeholder='Password' aria-describedby='sizing-addon2' required>
								<span class='input-group-btn'>
			        		<button class='btn btn-secondary'  type='submit'>Go!</button>
			      		</span>
			        </div>
						</form>
					</div>
      </div>
			</div>";
    }


?>
