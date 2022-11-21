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


    <div class="container">
        <div class="row">

            <div class="table-responsive mt-5">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fa fa-user-plus"></i> Add Client
                </button>

                <table class="table table-bordered stripe" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Household #</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Date of Visit</th>
                            <th>View</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
            
                        <?php
                            $query = "SELECT * FROM tbl_client";
                            $query_run = mysqli_query($connection,$query);

                        ?>


                            <?php

                                if (mysqli_num_rows($query_run) > 0){

                                    while($row = mysqli_fetch_assoc($query_run)){

                            ?>


                                        <tr style="text-transform: capitalize;">
                                            <td><?php echo htmlspecialchars($row['id']); ?> </td>
                                            <td><?php echo htmlspecialchars($row['household_id']); ?> </td>
                                            <td><?php echo htmlspecialchars($row['lname']." ".$row['fname']. " " .$row['mname']). " " .$row['suffix']; ?> </td>
                                            <td><?php echo htmlspecialchars($row['age']); ?> </td>
                                            <td><?php echo htmlspecialchars($row['address']); ?> </td>
                                            <td><?php echo htmlspecialchars(date ('Y-m-d H:i', strtotime($row['visit_date']))); ?> </td>

                                            <td width="2%">
                                                <form action="#" method="post" target="_blank">
                                                    <input type="hidden" name="view_Rid" value="<?php echo htmlspecialchars($row['id']); ?>">
                                                    <button  type="submit" name="viewR_btn" class="btn btn-info btn-circle"><i class='fas fa-eye'></i></button>
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

    </div>

<?php

    include('../include/footer.php');

?>


<script>

    $(document).ready(function () {
        $('#dataTable1').DataTable();
    });

</script>