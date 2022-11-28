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


?>

<?php

    if(isset($_POST['btn_addservices'])){

        $services_client_id = mysqli_real_escape_string($connection, check_input($_POST['edit_services_client_id']));

    }

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 mt-5">
            <form>
                <input type="text" class="form-control" id="editInput_family_id1" name="view_client" value="<?php echo htmlspecialchars($services_client_id); ?>">

                <!-- query for course or section -->
                <?php
                // $query = "SELECT tbl_client.id AS ID, tbl_client.lname AS CLNAME, tbl_client.fname AS CFNAME, tbl_client.mname AS CMNAME, tbl_client.suffix AS CSUFFIX, tbl_household_member.lname AS MLNAME, 
                // tbl_household_member.head_family_id AS HMHFID, tbl_household_member.fname AS MLNAME, tbl_household_member.fname AS MFNAME, tbl_household_member.mname AS MMNAME, tbl_household_member.suffix AS MSUFFIX  
                // FROM tbl_client INNER JOIN tbl_household_member ON tbl_client.id = tbl_household_member.head_family_id 
                // WHERE tbl_client.id = '$services_client_id' AND tbl_household_member.head_family_id = '$services_client_id'";
                $query = "SELECT tbl_client.id AS ID, tbl_client.lname AS CLNAME, tbl_client.fname AS CFNAME, tbl_client.mname AS CMNAME, tbl_client.suffix AS CSUFFIX, tbl_client.date_created AS CDCREATED,
                tbl_household_member.head_family_id AS HMHFID, tbl_household_member.lname AS MLNAME,  tbl_household_member.fname AS MFNAME, tbl_household_member.mname AS MMNAME, tbl_household_member.suffix AS MSUFFIX, tbl_household_member.date_created AS MDCREATED  
                FROM tbl_client INNER JOIN tbl_household_member ON tbl_client.id = tbl_household_member.head_family_id 
                WHERE tbl_client.id = '$services_client_id' AND tbl_household_member.head_family_id = '$services_client_id' GROUP BY tbl_household_member.date_created;";
                $query_run = mysqli_query($connection,$query);

                ?>

                <!-- Input Fields -->
                <div class="form-group">
                    <label>Name</label>
                        <select name="section" class="form-control" required>
                            <option selected disabled value="">-- Select --</option>
                            

                                        <?php

                            if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                            

                                    if($row['ID'] == $services_client_id and $row['HMHFID'] == $services_client_id){


                                        ?>

                                        <option value="<?php echo htmlspecialchars($row['ID']);?>"> <?php echo htmlspecialchars($row['CLNAME']) . " " . htmlspecialchars($row['CFNAME']) . " " . htmlspecialchars($row['CMNAME']) . " " . htmlspecialchars($row['CSUFFIX']);?> </option>

                                        <?php

                                    }else{



                                        ?>

                                       
                                        <option value="<?php echo htmlspecialchars($row['HMHFID']);?>"> <?php echo htmlspecialchars($row['MLNAME']) . " " . htmlspecialchars($row['MFNAME']) . " " . htmlspecialchars($row['MMNAME']) . " " . htmlspecialchars($row['MSUFFIX']);?> </option>

                                        <?php

                                    }

                                        ?> 

                                    


                                    <?php
                                }
                            }
                                    ?>

                        </select>
                </div>
                <!-- end query for course or section -->
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>




<?php

    include('../include/footer.php');

?>


