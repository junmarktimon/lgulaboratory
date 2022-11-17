<?php

session_start();

include('include/config.php');

if($dbconfig)
{

}
else
{
header("Location: include/config.php");
}

if(!$_SESSION['username'])
{
	header("Location: index.php");
}


?>
