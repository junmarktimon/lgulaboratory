<?php

	session_start();

    include 'include/header.php';

?>





	<div class="text-center mt-5">

		<img src="img/logo.png" class="rounded-circle" style="width: 10em; height: 9em;">
		<h3 class="mt-3"> AICS INFORMATION SYSTEM </h3>

		
	</div>


	<div class="container mt-5">
		<div class="row">
			<div class="col-4">  </div>
			<div class="col-4">

					<?php

						if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
						{
							echo '<br><div class="alert alert-danger" role="alert" id="message"> <i class="fas fa-times "></i> '.$_SESSION['status'].' </i></div>';
							unset($_SESSION['status']);
						}
					?>

				<form action="code.php" method="post">
				  <div class="form-group">
				    <label for="exampleInputEmail1"> Username </label>
				    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
				  </div>
				  <button type="submit" class="btn btn-primary btn-block" name="btn_login"> Login </button>
				</form>

				<h6 class="text-center mt-5"> DEVELOP BY: </h6>
				<p class="text-center font-weight-bolder"> CITY HEALTH OFFICE_VAXCERT ICT TEAM</p>
				
			</div>
			<div class="col-4"></div>
		</div>
	</div>





	

<?php

	include 'include/footer.php';

?>









     