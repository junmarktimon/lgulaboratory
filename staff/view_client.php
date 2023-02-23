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


    include '../include/validate.php';
    include '../include/navbar.php';

    $last_id;
    $client_id = "";
    $client_name = "";

    // 

?>

        <?php

    //code for viewing client personal info and family member
     if (isset($_POST['btn_view_client'])){
        
        $client_id1 = mysqli_real_escape_string($connection, check_input($_POST['view_client']));
        $client_id2 = mysqli_real_escape_string($connection, check_input($_POST['view_client1']));


        if(empty($client_id2) and  !empty($client_id1)){
            $client_id = $client_id1;
        }else{
            $client_id = $client_id2;
        }

        ?>


        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-1"></div>
                
                        

                        <div class="col-4 bg-light border border-light rounded">

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

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-5 mt-5" id="add_member" data-toggle="modal" data-target="#staticBackdrop2" data-id1="<?php echo htmlspecialchars($client_id); ?>" >
                                <i class="fa fa-user-plus"></i> Add Member
                            </button>

                                <h1 class="text-center mt-1"> Family Member List</h1>
                                    <?php

                                        $query5 = "SELECT * FROM tbl_client WHERE id = '$client_id' LIMIT 1";
                                        $query_run5 = mysqli_query($connection,$query5);

                                        foreach($query_run5 as $row5){

                                            ?>

                                                <h3 class="text-center" style="text-transform: uppercase;">(<?php echo htmlspecialchars($row5['lname'] . " " . $row5['fname'] . " " . $row5['mname'] . " " . $row5['suffix']) ?>)</h3>

                                            <?php

                                        }
                                    ?>
                            <div class="table-responsive mt-5">
                                <table class="table table-bordered stripe" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> Seq. # </th>
                                            <!-- <th> ID # </th>
                                            <th> Family ID </th> -->
                                            <th> Name </th>
                                            <th> Relation </th>
                                            <th> Edit </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $query = "SELECT * FROM tbl_client WHERE head_family_id = '$client_id'";
                                            $query_run = mysqli_query($connection,$query);

                                        ?>


                                            <?php
                                                
                                                $seq = 1;

                                                if (mysqli_num_rows($query_run) > 0){

                                                    while($row = mysqli_fetch_assoc($query_run)){

                                            ?>


                                                        <tr style="text-transform: capitalize;">
                                                            <td><?php echo htmlspecialchars($seq++); ?> </td>
                                                            <!-- <td><?php //echo htmlspecialchars($row['id']); ?> </td>
                                                            <td><?php //echo htmlspecialchars($row['head_family_id']); ?> </td> -->
                                                            <td style="text-transform: uppercase;"><?php echo htmlspecialchars($row['lname']." ".$row['fname']. " " .$row['mname']). " " .$row['suffix']; ?> </td>
                                                            <td style="text-transform: uppercase;"><?php echo htmlspecialchars($row['relation']); ?> </td>

                                                            <td>
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-success btn-circle"  id="edit_member" data-toggle="modal" data-target="#staticBackdrop4" data-id1="<?php echo htmlspecialchars($row['id']); ?>"  data-id2="<?php echo htmlspecialchars($row['lname']); ?>" data-id3="<?php echo htmlspecialchars($row['fname']); ?>" data-id4="<?php echo htmlspecialchars($row['mname']); ?>" data-id5="<?php echo htmlspecialchars($row['suffix']); ?>" data-id6="<?php echo htmlspecialchars($row['relation']); ?>" data-id7="<?php echo htmlspecialchars($row['head_family_id']); ?>">
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

                        <div class="col-1"></div>

                        <div class="col-5 bg-light border border-light rounded">

                            <form action="add_services.php" method="post">
                                <input type="hidden" name="edit_services_client_id" value="<?php echo htmlspecialchars($client_id); ?>">
                                <button  type="submit" name="btn_addservices" class="btn btn-primary mb-5 mt-5"><i class="fas fa-user-edit"></i> Add Services</button>
                            </form>
                      

                                <h1 class="text-center mt-3"> Served Services List</h1>
                            <div class="table-responsive mt-5">
                                <table class="table table-bordered stripe" id="dataTable3" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th> Seq. # </th>
                                        <!-- <th> ID# </th> -->
                                        <th> Name </th>
                                        <th> Services </th>
                                        <th> Amount </th>
                                        <th> Visit Date </th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        
                                        <?php
                                            $query1 = "SELECT tbl_client.id AS ID, tbl_client.lname, tbl_client.fname, tbl_client.mname, tbl_client.suffix, tbl_client.head_family_id, tbl_client.relation,
                                            tbl_services.id AS SID, tbl_services.client_id, tbl_services.member_id, tbl_services.services, tbl_services.amount, tbl_services.date_created
                                            FROM tbl_client 
                                            INNER JOIN tbl_services ON tbl_client.id = tbl_services.member_id WHERE tbl_services.client_id = '$client_id'
                                            GROUP BY tbl_services.date_created ORDER BY tbl_services.id DESC;";
                                            $query_run1 = mysqli_query($connection,$query1);

                                        ?>


                                            <?php
                                                
                                                $seq1 = 1;

                                                if (mysqli_num_rows($query_run1) > 0){

                                                    while($row1 = mysqli_fetch_assoc($query_run1)){

                                            ?>


                                                        <tr style="text-transform: uppercase;">
                                                            <td><?php echo htmlspecialchars($seq1++); ?> </td>
                                                            <!-- <td><?php //echo htmlspecialchars($row1['SID']); ?> </td> -->
                                                            <td>
                                                                <?php
                                                                     echo htmlspecialchars($row1['lname'] . " " . $row1['fname'] . " " . $row1['mname'] . " " . $row1['suffix']); 
                                                                ?> 
                                                            </td>
                                                            <td><?php echo htmlspecialchars($row1['services']); ?> </td>
                                                            <td><?php echo htmlspecialchars($row1['amount']); ?> </td>
                                                            <td><?php echo htmlspecialchars($row1['date_created']); ?> </td>


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

                        <div class="col-1"></div>
            </div>
        </div>

        <?php
    

    }else{

        if (isset($_GET['view_client'])){

        $client_id = mysqli_real_escape_string($connection, check_input($_GET['view_client']));

        ?>


        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-1"></div>
                
                        

                        <div class="col-4 bg-light border border-light rounded">

                            <?php
                                if (isset($_SESSION['success']) && $_SESSION['success'] !=''){
                                    echo '<div class="p-3 mb-2 bg-success text-white mt-3" id="message"> '.htmlspecialchars($_SESSION['success']).'</div>';
                                    unset($_SESSION['success']);
                                }

                                if (isset($_SESSION['failed']) && $_SESSION['failed'] !=''){
                                    echo '<div class="p-3 mb-2 bg-danger text-white mt-3" id="message"> '.htmlspecialchars($_SESSION['failed']).'</div>';
                                    unset($_SESSION['failed']);
                                }
                            ?>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-5 mt-5" id="add_member" data-toggle="modal" data-target="#staticBackdrop2" data-id1="<?php echo htmlspecialchars($client_id); ?>" >
                                <i class="fa fa-user-plus"></i> Add Member
                            </button>

                                <h1 class="text-center mt-1"> Family Member List</h1>
                                <?php

                                        $query5 = "SELECT * FROM tbl_client WHERE id = '$client_id' LIMIT 1";
                                        $query_run5 = mysqli_query($connection,$query5);

                                        foreach($query_run5 as $row5){

                                            ?>

                                                <h3 class="text-center" style="text-transform: uppercase;">(<?php echo htmlspecialchars($row5['lname'] . " " . $row5['fname'] . " " . $row5['mname'] . " " . $row5['suffix']) ?>)</h3>

                                            <?php

                                        }
                                    ?>
                                
                            <div class="table-responsive mt-5">
                                <table class="table table-bordered stripe" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> Seq. # </th>
                                            <!-- <th> ID # </th>
                                            <th> Family ID </th> -->
                                            <th> Name </th>
                                            <th> Relation </th>
                                            <th> Edit </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $query = "SELECT * FROM tbl_client WHERE head_family_id = '$client_id'";
                                            $query_run = mysqli_query($connection,$query);

                                        ?>


                                            <?php
                                                
                                                $seq = 1;

                                                if (mysqli_num_rows($query_run) > 0){

                                                    while($row = mysqli_fetch_assoc($query_run)){

                                            ?>


                                                        <tr style="text-transform: uppercase;">
                                                            <td><?php echo htmlspecialchars($seq++); ?> </td>
                                                            <!-- <td><?php //echo htmlspecialchars($row['id']); ?> </td>
                                                            <td><?php //echo htmlspecialchars($row['head_family_id']); ?> </td> -->
                                                            <td><?php echo htmlspecialchars($row['lname']." ".$row['fname']. " " .$row['mname']). " " .$row['suffix']; ?> </td>
                                                            <td><?php echo htmlspecialchars($row['relation']); ?> </td>

                                                            <td width="2%">
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-success btn-circle"  id="edit_member" data-toggle="modal" data-target="#staticBackdrop4" data-id1="<?php echo htmlspecialchars($row['id']); ?>"  data-id2="<?php echo htmlspecialchars($row['lname']); ?>" data-id3="<?php echo htmlspecialchars($row['fname']); ?>" data-id4="<?php echo htmlspecialchars($row['mname']); ?>" data-id5="<?php echo htmlspecialchars($row['suffix']); ?>" data-id6="<?php echo htmlspecialchars($row['relation']); ?>" data-id7="<?php echo htmlspecialchars($row['head_family_id']); ?>">
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

                        <div class="col-1"></div>

                        <div class="col-5 bg-light border border-light rounded">

                            <form action="add_services.php" method="post">
                                <input type="hidden" name="edit_services_client_id" value="<?php echo htmlspecialchars($client_id); ?>">
                                <button  type="submit" name="btn_addservices" class="btn btn-primary mb-5 mt-5"><i class="fas fa-user-edit"></i> Add Services</button>
                            </form>
                      

                                <h1 class="text-center mt-3"> Served Services List</h1>
                            <div class="table-responsive mt-5">
                                <table class="table table-bordered stripe" id="dataTable3" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th> Seq. # </th>
                                        <!-- <th> ID# </th> -->
                                        <th> Name </th>
                                        <th> Services </th>
                                        <th> Amount </th>
                                        <th> Visit Date </th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        
                                        <?php
                                            $query1 = "SELECT tbl_client.id AS ID, tbl_client.lname, tbl_client.fname, tbl_client.mname, tbl_client.suffix, tbl_client.head_family_id, tbl_client.relation,
                                            tbl_services.id AS SID, tbl_services.client_id, tbl_services.member_id, tbl_services.services, tbl_services.amount, tbl_services.date_created
                                            FROM tbl_client 
                                            INNER JOIN tbl_services ON tbl_client.id = tbl_services.member_id WHERE tbl_services.client_id = '$client_id'
                                            GROUP BY tbl_services.date_created ORDER BY tbl_services.id DESC;";
                                            $query_run1 = mysqli_query($connection,$query1);

                                        ?>


                                            <?php
                                                
                                                $seq1 = 1;

                                                if (mysqli_num_rows($query_run1) > 0){

                                                    while($row1 = mysqli_fetch_assoc($query_run1)){

                                            ?>


                                                        <tr style="text-transform: uppercase;">
                                                            <td><?php echo htmlspecialchars($seq1++); ?> </td>
                                                            <!-- <td><?php //echo htmlspecialchars($row1['SID']); ?> </td> -->
                                                            <td>
                                                                <?php
                                                                    // if($row1['tbl_services.member_id'] == $client_id){

                                                                    // }
                                                                     echo htmlspecialchars($row1['lname'] . " " . $row1['fname'] . " " . $row1['mname'] . " " . $row1['suffix']); 
                                                                ?> 
                                                            </td>
                                                            <td><?php echo htmlspecialchars($row1['services']); ?> </td>
                                                            <td><?php echo htmlspecialchars($row1['amount']); ?> </td>
                                                            <td><?php echo htmlspecialchars($row1['date_created']); ?> </td>


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

                        <div class="col-1"></div>
            </div>
        </div>

        <?php

        }

    }


    ?>
<?php

    include('footer.php');

    // Close the connection
mysqli_close($connection); 


?>


<script>

    $(document).ready(function () {
        $('#dataTable2').DataTable();
    });

    $(document).ready(function () {
        $('#dataTable3').DataTable();
    });

</script>