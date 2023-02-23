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

                <?php
                    if (isset($_SESSION['success']) && $_SESSION['success'] !=''){
                        echo '<div class="p-3 mb-2 bg-success text-white mt-5" id="message"> '.htmlspecialchars($_SESSION['success']).'</div>';
                        unset($_SESSION['success']);
                    }

                    if (isset($_SESSION['failed']) && $_SESSION['failed'] !=''){
                        echo '<div class="p-3 mb-2 bg-danger text-white mt-5" id="message"> '.htmlspecialchars($_SESSION['failed']).'</div>';
                        unset($_SESSION['failed']);
                    }
                ?>

            <div class="table-responsive mt-5 ">

                    <h1 class="text-center"> CLIENT/MEMBER LIST </h1>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fa fa-user-plus"></i> Add Client
                </button>

                <table class="table table-bordered stripe" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Seq. #</th>
                            <th>ID #</th>
                            <th>Name</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
            
                        <?php
                            $query = "SELECT id, lname, fname, mname, suffix, head_family_id, age, relation, address FROM tbl_client ORDER BY id DESC";
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
                                            <td style="text-transform: uppercase;"><?php echo htmlspecialchars($row['lname']." ".$row['fname']. " " .$row['mname']). " " .$row['suffix']; ?> </td>

                                            <td width="2%">
                                                <form action="view_client.php" method="post">
                                                    <input type="hidden" name="view_client" value="<?php echo htmlspecialchars($row['id']); ?>">
                                                    <input type="hidden" name="view_client1" value="<?php echo htmlspecialchars($row['head_family_id']); ?>">
                                                    <input type="hidden" name="view_client_name" value="<?php echo htmlspecialchars($row['lname']." ".$row['fname']. " " .$row['mname']. " " .$row['suffix']); ?>">
                                                    <button  type="submit" name="btn_view_client" class="btn btn-info btn-circle"><i class='fas fa-eye'></i></button>
                                                </form>
                                            </td>

                                            <td width="2%">
                                                 <?php
                                                    if(empty($row['head_family_id'])){
                                                ?>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-success btn-circle"  id="edit_client" data-toggle="modal" data-target="#staticBackdrop3" data-id1="<?php echo htmlspecialchars($row['id']); ?>" data-id2="<?php echo htmlspecialchars($row['lname']); ?>" data-id3="<?php echo htmlspecialchars($row['fname']); ?>" data-id4="<?php echo htmlspecialchars($row['mname']); ?>" data-id5="<?php echo htmlspecialchars($row['suffix']); ?>" data-id6="<?php echo htmlspecialchars($row['age']); ?>" data-id7="<?php echo htmlspecialchars($row['address']); ?>">
                                                            <i class="fas fa-user-edit"></i> 
                                                        </button>

                                                <?php
                                                    }else{
                                                        ?>

                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-success btn-circle" disabled>
                                                            <i class="fas fa-user-edit"></i> 
                                                        </button>

                                                    <?php
                                                    }
                                                ?>
                                            </td>

                                            <td class="text-center" style="width: 2%;">
                                                <?php
                                                    if(empty($row['head_family_id'])){
                                                ?>
                                                        <!-- Button trigger modal -->
                                                        <button type="button"  class="btn btn-danger btn-circle" data-id1="<?php echo htmlspecialchars($row['id']); ?>" data-toggle="modal" data-target="#staticBackdrop6" id="clientdeleteid">
                                                        <i class="fas fa-user-times"></i>
                                                        </button>
                                                <?php

                                                    }else{
                                                ?>

                                                        <!-- Button trigger modal -->
                                                        <button type="button"  class="btn btn-danger btn-circle" disabled>
                                                        <i class="fas fa-user-times"></i>
                                                        </button>

                                                        <?php
                                                    }
                                                ?>
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

// Close the connection
mysqli_close($connection);   

?>


<script>

    $(document).ready(function () {
        $('#dataTable1').DataTable({
            // order: [[2, 'desc']],
        });
        
    });

</script>