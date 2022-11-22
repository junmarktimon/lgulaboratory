<?php

	session_start();

    // include 'include/header.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title> AICS INFORMATION SYSTEM </title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">


    
  </head>
  <body>





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

				<h6 class="text-center mt-5"> DEVELOPED BY: </h6>
				<p class="text-center font-weight-bolder"> CITY HEALTH OFFICE-VAXCERT ICT TEAM</p>
				
				<div>
					<span> Love Sniper </span>
					<span> Love Sniper </span>
					<span> Love Sniper </span>
					<span> Love Sniper </span>
				</div>
				
			</div>
			<div class="col-4"></div>
		</div>
	</div>





	

<?php

	include 'include/footer.php';

?>









     