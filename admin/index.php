<?php
    include('../include/header.php');
    include('../security.php');

    if(!$_SESSION['username'])
    {
        header("Location: ../index.php");
    }
    if($_SESSION['role'] != 1)
    {
        header("Location: ../index.php");
    }
    


?>

    <form action="../logout.php" method="POST"> 
           
        <button type="submit" name="btn_logout" class="btn btn-primary">Logout</button>

    </form>

    <h1> WELCOME</h1>