


<?php
	
	//create variable to hold database configuration 
	$server_name ="localhost";
	$db_username = "root";
	$db_password = "1234";
	$db_name = "db_laboratory";


	//create database connection	   
	$connection = mysqli_connect("$server_name","$db_username","$db_password");
	$dbconfig = mysqli_select_db($connection,$db_name);


	//check if database is connected
	if($dbconfig){

		//if connected no display

	}else{

		//if not connected echo or display the error
	 	echo "Database Connection Error";
	 	
	}


