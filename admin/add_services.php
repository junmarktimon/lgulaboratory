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

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Member</label>
                    <select class="form-control" id="myselection">
                        <option>--select--</option>
                        <option value="1"> Head Of Family </option>
                        <option value="2"> Member OF Family </option>
                    </select>
                </div>


                <?php

                    $query= "SELECT * FROM tbl_client WHERE id = '$services_client_id' LIMIT 1";
                    $query_run = mysqli_query($connection,$query);

                ?>

                <div class="form-group mydiv" id="mySelectOption1">
                    <label for="exampleFormControlSelect1">Client</label>
                    <select class="form-control">
                                    <?php
                            if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                                    ?>

                                    <option value="<?php echo htmlspecialchars($row['id']);?>"> <?php echo htmlspecialchars($row['lname']) . " " . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['mname']) . " " . htmlspecialchars($row['suffix']);?> </option>

                                    <?php
                                }
                            }
                                    ?>
                    </select>
                </div>

                <?php

                    $query1= "SELECT * FROM tbl_household_member WHERE head_family_id = '$services_client_id'";
                    $query_run1 = mysqli_query($connection,$query1);

                ?>

                <div class="form-group mydiv" id="mySelectOption2">
                    <label for="exampleFormControlSelect1">Member</label>
                    <select class="form-control">
                        <option>--select--</option>
                        <?php
                            if (mysqli_num_rows($query_run1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($query_run1)) {
                                    ?>

                                    <option value="<?php echo htmlspecialchars($row1['id']);?>"> <?php echo htmlspecialchars($row1['lname']) . " " . htmlspecialchars($row1['fname']) . " " . htmlspecialchars($row1['mname']) . " " . htmlspecialchars($row1['suffix']);?> </option>

                                    <?php
                                }
                            }
                                    ?>
                    </select>
                </div>

                
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


<script>

    $(document).ready(function(){
    $('#myselection').on('change', function(){
    	var demovalue = $(this).val(); 
        $("div.mydiv").hide();
        $("#mySelectOption"+demovalue).show();
    });
});
</script>


