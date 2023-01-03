<?php
    include('../include/header.php');
    include('../security.php');

    if(!$_SESSION['username'])
    {
        header("Location: ../index.php");
    }
    if($_SESSION['role'] != 2)
    {
        header("Location: ../index.php");
    }


    include '../include/navbar.php';
    
    $session_name = $_SESSION['username'];
    $last_id;


?>

<div class="container-fluid mt-5">
    <div class="row">
       
        <div class="col-4"></div>

        <div class="col-4 bg-light border border-light rounded">

            <h3 class="text-center mt-3"> Change Password </h3>

                <?php

            $query = "SELECT * FROM tbl_user WHERE username = '$session_name' LIMIT 1";
            $query_run = mysqli_query($connection,$query);

            foreach($query_run as $row){

                ?>

                <!-- <form action="../code.php" method="post"> -->
                <form>

                    <input type="hidden" name="">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="twxt" class="form-control" name="uname" value="<?php echo htmlspecialchars($row['username']) ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="pwd" class="form-control" id="password" onkeyup="CheckPassword(this)" required>
                        <span style="color:red; font-size:10px;">* Your password must be 8 or more characters long, contain letters, numbers, and special characters </span>
                        <div  id="passwordValidation" style="color:red" >
    
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="pwd1" class="form-control" id="confirm_password" onkeyup='confirmPassword(this);' required>
                        <span id='message1'></span>
                    </div>
                    
                    <button type="submit" class="btn btn-primary float-right mb-5" name="btn_change_pwd" id="btn_update_password"> Update </button>
                </form>


                <?php

            }

                ?>

        </div>

        <div class="col-4"></div>

    </div>
</div>


<div class="container-fluid mt-5">
    <div class="row">

    <div class="col-4"></div>

    <div class="col-4 bg-light border border-light rounded"> </div>


    <div class="col-4"></div>
    

    </div>
</div>








<?php
                                                       

    include('footer.php');

?>

<script>

document.getElementById("btn_update_password").disabled = true;

    $(document).ready(function () {
        $('#dataTable4').DataTable();
    });

    function CheckPassword(inputtxt) { 
        var passw= /^(?=.*\d)(?=.*[a-z])(?=.*[^A-Z0-9])(?!.*\s).{7,15}$/;
        if(inputtxt.value.match(passw)) 
        { 
        $("#passwordValidation").html("")
        return true;
        }
        else
        { 
        $("#passwordValidation").html("min 8 characters which contain capital and small letter, at least one numeric digit and a special character");
        return false;
        }
    }

    function confirmPassword(inputtxt) {
        if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
            document.getElementById('message1').style.color = 'green';
            document.getElementById('message1').innerHTML = 'matching';
            document.getElementById("btn_update_password").disabled = false;
        } else {
            document.getElementById('message1').style.color = 'red';
            document.getElementById('message1').innerHTML = 'not matching';
            document.getElementById("btn_update_password").disabled = true;
        }
    }

</script>

