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


    include '../include/validate.php';
    include '../include/navbar.php';

    $last_id;

?>


<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-1"></div>
        
                <?php

            //code for viewing client personal info and family member
            if (isset($_POST['view_client'])){

                $client_id = mysqli_real_escape_string($connection, check_input($_POST['view_client']));

                ?>

                <div class="col-4 border">
                        <h1 class="text-center mt-3"> Family Member List</h1>
                    <div class="table-responsive mt-5">
                        <table class="table table-bordered stripe" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> Seq. # </th>
                                    <th> ID # </th>
                                    <th> Family ID </th>
                                    <th> Name </th>
                                    <th> Relation </th>
                                    <th> View </th>
                                    <th> Edit </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $query = "SELECT * FROM tbl_household_member WHERE head_family_id = '$client_id'";
                                    $query_run = mysqli_query($connection,$query);

                                ?>


                                    <?php
                                        
                                        $seq = 1;

                                        if (mysqli_num_rows($query_run) > 0){

                                            while($row = mysqli_fetch_assoc($query_run)){

                                    ?>


                                                <tr style="text-transform: capitalize;">
                                                    <td><?php echo htmlspecialchars($seq++); ?> </td>
                                                    <td><?php echo htmlspecialchars($row['id']); ?> </td>
                                                    <td><?php echo htmlspecialchars($row['head_family_id']); ?> </td>
                                                    <td><?php echo htmlspecialchars($row['lname']." ".$row['fname']. " " .$row['mname']). " " .$row['suffix']; ?> </td>
                                                    <td><?php echo htmlspecialchars($row['client_relation']); ?> </td>

                                                    <td width="2%">
                                                        <form action="view_client.php" method="post">
                                                            <input type="hidden" name="view_client" value="<?php echo htmlspecialchars($row['id']); ?>">
                                                            <button  type="submit" name="btn_view_client" class="btn btn-info btn-circle"><i class='fas fa-eye'></i></button>
                                                        </form>
                                                    </td>

                                                    <td width="2%">
                                                        <form action="#" method="post">
                                                            <input type="hidden" name="edit_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                                            <button  type="submit" name="edit_btn" class="btn btn-success btn-circle"><i class="fas fa-user-edit"></i></button>
                                                        </form>
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

                <div class="col-4 border">
                        <h1 class="text-center mt-3"> Served Services List</h1>
                    <div class="table-responsive mt-5">
                        <table class="table table-bordered stripe" id="dataTable3" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th> Seq. # </th>
                                <th> ID# </th>
                                <th> Name </th>
                                <th> Services </th>
                                <th> Amount </th>
                                <th> Visit Date </th>
                                <th> View </th>
                                <th> Edit </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $query = "SELECT * FROM tbl_services WHERE client_id = '$client_id' ORDER BY id DESC";
                                    $query_run = mysqli_query($connection,$query);

                                ?>


                                    <?php
                                        
                                        $seq = 1;

                                        if (mysqli_num_rows($query_run) > 0){

                                            while($row = mysqli_fetch_assoc($query_run)){

                                    ?>
                                      
                                                    <tr style="text-transform: capitalize;">
                                                    <td><?php echo htmlspecialchars($seq++); ?> </td>
                                                    <td><?php echo htmlspecialchars($row['id']); ?> </td>
                                                    <<td><?php echo htmlspecialchars($row['client_id']); ?> </td>
                                                    <td><?php echo htmlspecialchars($row['services']); ?> </td>
                                                    <td><?php echo htmlspecialchars($row['amount']); ?> </td>
                                                    <td><?php echo htmlspecialchars(date ('Y-m-d H:i', strtotime($row['date_created']))); ?> </td>

                                                    <td width="2%">
                                                        <form action="view_client.php" method="post">
                                                            <input type="hidden" name="view_client" value="<?php echo htmlspecialchars($row['id']); ?>">
                                                            <button  type="submit" name="btn_view_client" class="btn btn-info btn-circle"><i class='fas fa-eye'></i></button>
                                                        </form>
                                                    </td>

                                                    <td width="2%">
                                                        <form action="#" method="post">
                                                            <input type="hidden" name="edit_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                                            <button  type="submit" name="edit_btn" class="btn btn-success btn-circle"><i class="fas fa-user-edit"></i></button>
                                                        </form>
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

                <?php

            }

                ?>

                <div class="col-1"></div>
    </div>
</div>



<?php

    include('../include/footer.php');

?>


<script>

    $(document).ready(function () {
        $('#dataTable2').DataTable();
    });

    $(document).ready(function () {
        $('#dataTable3').DataTable();
    });

</script>