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


    include '../include/navbar.php';
    

    $last_id;


?>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-2"></div>

        <div class="col-3 bg-light border border-light rounded">

            <h3 class="text-center mt-3"> Change Password </h3>

                <?php

            $query = "SELECT * FROM tbl_user WHERE username = 'admin' LIMIT 1";
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

        <div class="col-1"></div>

        <div class="col-4 bg-light border border-light rounded">

            <h3 class="text-center mt-3"> User List </h3>

            <div class="table-responsive mt-5">
                <table class="table table-bordered stripe" id="dataTable4" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Seq. # </th>
                            <th> ID # </th>
                            <th> Username </th>
                            <th> Role </th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </tr>
                    </thead>
                    <tbody>
                                <?php
                            $query = "SELECT * FROM tbl_user WHERE username != 'admin'";
                            $query_run = mysqli_query($connection,$query);

                                
                                $seq = 1;

                                if (mysqli_num_rows($query_run) > 0){

                                    while($row = mysqli_fetch_assoc($query_run)){

                                            ?>


                                        <tr style="text-transform: capitalize;">
                                            <td><?php echo htmlspecialchars($seq++); ?> </td>
                                            <td><?php echo htmlspecialchars($row['id']); ?> </td>
                                            <td><?php echo htmlspecialchars($row['username']); ?> </td>
                                            <td><?php echo htmlspecialchars($row['role']); ?> </td>

                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-success btn-circle"  id="edit_member" data-toggle="modal" data-target="#staticBackdrop4" data-id1="<?php echo htmlspecialchars($row['id']); ?>" >
                                                    <i class="fas fa-user-edit"></i> 
                                                </button>
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button"  class="btn btn-danger btn-circle" data-id2="<?php echo htmlspecialchars($row['id']); ?>" data-toggle="modal" data-target="#exampleModal" id="userdeleteid">
                                                    <i class="fas fa-user-edit"></i>
                                                </button>
                                            </td>

                                        </tr>
                                                <?php

                                    }

                                }else {
                                        
                                }

                                        ?>
                    </tbody>
                </table>
            </div>


        </div>

        <div class="col-2"></div>
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

