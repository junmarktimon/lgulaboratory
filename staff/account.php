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

    $id = $_SESSION['id'];


    include '../include/navbar.php';
    

    $last_id;


?>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-4"></div>

        <div class="col-4 bg-light border border-light rounded">

            <h3 class="text-center mt-3"> Change Password </h3>

                <?php

            $query = "SELECT * FROM tbl_user WHERE id = '$id' LIMIT 1";
            $query_run = mysqli_query($connection,$query);

            foreach($query_run as $row){

                ?>

                <form>

                    <input type="hidden" name="">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="twxt" class="form-control" value="<?php echo htmlspecialchars($row['username']) ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" required>
                        <span style="color:red; font-size:10px;">* Your password must be 8 or more characters long, contain letters, numbers, and special characters </span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary float-right mb-5" name="btn_change_pwd"> Update </button>
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
                                                       

    include('../include/footer.php');

?>

<script>

    $(document).ready(function () {
        $('#dataTable4').DataTable();
    });

</script>

