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

            <div class="table-responsive mt-5 ">

                    <h1 class="text-center mb-5"> REPORT </h1>

                    <div class="float-right mb-3">
                    <!-- date("Y-m-d") -->
                       <form action="../code.php" method="post">
                        FROM <input type="date" name="from">  TO  <input type="date" name="to">
                            <button type="submit" class="btn btn-primary" name="btn_filter">Go</button>
                       </form>
                        
                    </div>

                <table class="table table-bordered stripe" id="dataTable10" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Seq. #</th>
                            <th>ID #</th>
                            <th>Name</th>
                            <th>Services</th>
                            <th>Visit Date</th>
                        </tr>
                    </thead>
                    <tbody>
            
                        <?php
                            $query = "SELECT tbl_client.id AS ID, tbl_client.lname, tbl_client.fname, tbl_client.mname, tbl_client.suffix, tbl_client.head_family_id, tbl_client.relation,
                            tbl_services.id AS SID, tbl_services.client_id, tbl_services.member_id, tbl_services.services, tbl_services.amount, tbl_services.date_created
                            FROM tbl_client 
                            INNER JOIN tbl_services ON tbl_client.id = tbl_services.member_id
                             ORDER BY tbl_services.id DESC;";
                            $query_run = mysqli_query($connection,$query);

                        ?>


                            <?php
                                
                                $seq = 1;

                                if (mysqli_num_rows($query_run) > 0){

                                    while($row = mysqli_fetch_assoc($query_run)){

                            ?>


                                        <tr style="text-transform: capitalize;">
                                            <td><?php echo htmlspecialchars($seq++); ?> </td>
                                            <td><?php echo htmlspecialchars($row['ID']); ?> </td>
                                            <td style="text-transform: uppercase;"><?php echo htmlspecialchars($row['lname']." ".$row['fname']. " " .$row['mname']). " " .$row['suffix']; ?> </td>
                                            <td><?php echo htmlspecialchars($row['services']); ?> </td>
                                            <td><?php echo htmlspecialchars($row['date_created']); ?> </td>

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
        $('#dataTable10').DataTable({
        });
        
    });

</script>