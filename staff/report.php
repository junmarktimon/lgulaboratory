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
    

    $last_id;

    //validate data
    function check_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



?>

<div class="container">
        <div class="row">

            <div class="col-10">
                <div class="table-responsive mt-5 " id="print">

                        <h1 class="text-center mb-5"> REPORT </h1>

                        <div class="float-right mb-3">
                        <!-- date("Y-m-d") -->
                        <form action="#" method="post">
                            <b>FROM</b> <input type="date" name="from" required>  <b>TO</b>  <input type="date" name="to" required>
                                <button type="submit" class="btn btn-primary" name="btn_filter">Go</button>

                        </form>
   
                        </div>


                        <?php

                            // Checking for a POST request
                            if (isset($_POST['btn_filter'])) {

                                $from = mysqli_real_escape_string($connection, check_input($_POST['from']));
                                $to =mysqli_real_escape_string($connection, check_input($_POST['to']));


                                    if (!empty($from) && !empty($to)){

                                        ?>

                                <h3> Total: 
                                    <?php 
                                        $querySum = "SELECT SUM(amount) AS TOTAL FROM tbl_services WHERE DATE(date_created) BETWEEN '$from' AND '$to' ";
                                        $query_run = mysqli_query($connection,$querySum);  
                                        while ($row = mysqli_fetch_assoc($query_run)){ 
                                        echo $row['TOTAL'];
                                        }

                                    ?>
                                </h3> 

                                <h3 class="mb-5">FROM: <?php echo htmlspecialchars($from); ?> - TO: <?php echo htmlspecialchars($to); ?></h3>

                                <table class="table table-bordered stripe" id="dataTable10" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Seq. #</th>
                                            <!-- <th>ID #</th> -->
                                            <th>Name</th>
                                            <th>Services</th>
                                            <th>Amount</th>
                                            <th>Visit Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                                        <?php

                                            $query = "SELECT tbl_client.id AS ID, tbl_client.lname, tbl_client.fname, tbl_client.mname, tbl_client.suffix, tbl_client.head_family_id, tbl_client.relation,
                                            tbl_services.id AS SID, tbl_services.client_id, tbl_services.member_id, tbl_services.services, tbl_services.amount, tbl_services.date_created
                                            FROM tbl_client 
                                            INNER JOIN tbl_services ON tbl_client.id = tbl_services.member_id
                                            WHERE DATE(tbl_services.date_created) BETWEEN '$from' AND '$to'
                                            ORDER BY tbl_services.id DESC";

                                            $query_run = mysqli_query($connection,$query);
                                                
                                                $seq = 1;

                                                if (mysqli_num_rows($query_run) > 0){

                                                    while($row = mysqli_fetch_assoc($query_run)){

                                            ?>


                                                        <tr style="text-transform: capitalize;">
                                                            <td><?php echo htmlspecialchars($seq++); ?> </td>
                                                            <!-- <td><?php //echo htmlspecialchars($row['ID']); ?> </td> -->
                                                            <td style="text-transform: uppercase;"><?php echo htmlspecialchars($row['lname']." ".$row['fname']. " " .$row['mname']). " " .$row['suffix']; ?> </td>
                                                            <td><?php echo htmlspecialchars($row['services']); ?> </td>
                                                            <td><?php echo htmlspecialchars($row['amount']); ?> </td>
                                                            <td><?php echo htmlspecialchars($row['date_created']); ?> </td>

                                                        </tr>
                                                                <?php

                                                    }

                                                }else {
                                                        
                                                }

                                                        ?>
                                                                
                                    </tbody>
                                </table>

                        <?php
                                }
                            
                            }else{

                        ?>

                                <h3> Total: 
                                    <?php 
                                        $querySum = "SELECT SUM(amount) AS TOTAL FROM tbl_services";
                                        $query_run = mysqli_query($connection,$querySum);  
                                        while ($row = mysqli_fetch_assoc($query_run)){ 
                                        echo $row['TOTAL'];
                                        }

                                    ?>
                                </h3>


                            <table class="table table-bordered stripe" id="dataTable10" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Seq. #</th>
                                        <!-- <th>ID #</th> -->
                                        <th>Name</th>
                                        <th>Services</th>
                                        <th>Amount</th>
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
                                            
                                            $seq = 1;

                                            if (mysqli_num_rows($query_run) > 0){

                                                while($row = mysqli_fetch_assoc($query_run)){

                                        ?>


                                                    <tr style="text-transform: capitalize;">
                                                        <td><?php echo htmlspecialchars($seq++); ?> </td>
                                                        <!-- <td><?php //echo htmlspecialchars($row['ID']); ?> </td> -->
                                                        <td style="text-transform: uppercase;"><?php echo htmlspecialchars($row['lname']." ".$row['fname']. " " .$row['mname']). " " .$row['suffix']; ?> </td>
                                                        <td><?php echo htmlspecialchars($row['services']); ?> </td>
                                                        <td><?php echo htmlspecialchars($row['amount']); ?> </td>
                                                        <td><?php echo htmlspecialchars($row['date_created']); ?> </td>

                                                    </tr>
                                                            <?php

                                                }

                                            }else {
                                                    
                                            }

                                                    ?>
                                                            
                                </tbody>
                            </table>

                        <?php
                            }
                        ?>


                    </div>

                </div>
            </div>

    </div>

<?php
                                                       

    include('footer.php');

    // Close the connection
mysqli_close($connection); 



?>


<script>

    $(document).ready(function () {
        $('#dataTable10').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        
    });

</script>