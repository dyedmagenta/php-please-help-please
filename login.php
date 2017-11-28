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
		        <div class='input-group'>
							<span class='input-group-addon' id='sizing-addon2' >@</span>
		          <input type='text' class='form-control' placeholder='Username' aria-describedby='sizing-addon2'>
							<br>
							<span class='input-group-addon' id='sizing-addon2'>🔒</span>
		          <input type='password' class='form-control' placeholder='Username' aria-describedby='sizing-addon2'>
							<span class='input-group-btn'>
		        		<button class='btn btn-secondary' type='button'>Go!</button>
		      		</span>
		        </div>
					</div>
      </div>
			</div>";
    }


?>
