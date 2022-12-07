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

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 mt-5 bg-light border border-light rounded">
            <h3 class="text-center mt-5"> Add Services</h3>
            <form class="mt-5" action="../code.php" method="post">

                <input type="hidden" class="form-control" id="editInput_family_id1" name="view_client" value="<?php echo htmlspecialchars($services_client_id); ?>">



                <?php

                    $query= "SELECT * FROM tbl_client WHERE head_family_id = '$services_client_id' || id = '$services_client_id'";
                    $query_run = mysqli_query($connection,$query);

                ?>

                <div class="form-group" >
                    <label for="exampleFormControlSelect1">Name</label>
                    <select class="form-control" name="client_or_member" style="text-transform: uppercase;" required>
                        <option selected disabled value=""> -- SELECT -- </option>

                                    <?php
                            if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                                    ?>

                                    <option value="<?php echo htmlspecialchars($row['id']);?>" style="text-transform: uppercase;"> <?php echo htmlspecialchars($row['lname']) . " " . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['mname']) . " " . htmlspecialchars($row['suffix']);?> </option>

                                    <?php
                                }
                            }
                                    ?>
                    </select>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Services</label>
                    <select class="form-control" name="services" required>
                        <option selected disabled value=""> -- SELECT -- </option>
                        <option value="CBC"> CBC </option>
                        <option value="URINALYSIS"> URINALYSIS </option>
                        <option value="FECALYSIS"> FECALYSIS </option>
                        <option value="BLOOD TYPING"> BLOOD TYPING </option>
                        <option value="PREGNANCY TEST"> PREGNANCY TEST </option>
                        <option value="HBsAg (ICT)"> HBsAg (ICT) </option>
                        <option value="SYPHILIS"> SYPHILIS </option>
                        <option value="HIV 1/2"> HIV 1/2 </option>
                        <option value="GRAM STAINING"> GRAM STAINING </option>
                        <option value="FASTING BLOOD SUGAR"> FASTING BLOOD SUGAR </option>
                        <option value="CHOLESTEROL (TOTAL)"> CHOLESTEROL (TOTAL) </option>
                        <option value="HDL DIRECT CHOLE"> HDL DIRECT CHOLE </option>
                        <option value="LDL DIRECT CHOLE"> LDL DIRECT CHOLE </option>
                        <option value="TRIGLYCERIDES"> TRIGLYCERIDES </option>
                        <option value="LIPID PROFILE"> LIPID PROFILE </option>
                        <option value="BLOOD URIC ACID"> BLOOD URIC ACID </option>
                        <option value="SERUM CRATININE"> SERUM CRATININE </option>
                        <option value="BLOOD UREA NITROGREN"> BLOOD UREA NITROGREN </option>
                        <option value="SGPT/ ALT"> SGPT/ ALT </option>
                        <option value=" SGOT/ AST"> SGOT/ AST </option>
                        <option value="ALP"> ALP </option>
                        <option value="TOTAL PROTIEN"> TOTAL PROTIEN </option>
                        <option value="ALBUMIN"> ALBUMIN </option>
                        <option value="TPAG"> TPAG </option>
                        <option value="TOTAL BILIRUBIN"> TOTAL BILIRUBIN </option>
                        <option value="TB DB"> TB DB </option>
                        <option value="SERUM SODIUM"> SERUM SODIUM </option>
                        <option value="SERUM POTASSIUM"> SERUM POTASSIUM </option>
                        <option value="HgbAc"> HgbAc </option>
                        <option value="75 gms OGTT"> 75 gms OGTT </option>
                        <option value="100 gms OGTT"> 100 gms OGTT </option>
                        <option value="TSH"> TSH </option>
                        <option value=""> T3 </option>
                        <option value="T3"> T4 </option>
                        <option value="FT3"> FT3 </option>
                        <option value="FT4"> FT4 </option>
                        <option value="C-REACTIVE PROTIEN"> C-REACTIVE PROTIEN </option>
                        <option value="TROPONIN I"> TROPONIN I </option>
                        <option value="NT PRO- BRAIN"> NT PRO- BRAIN </option>
                        <option value="NATRIURETIC PEPTIDE"> NATRIURETIC PEPTIDE </option>
                        <option value="(NT- pro- BNP)"> (NT- pro- BNP) </option>
                        <option value="D- DIMER"> D- DIMER </option>
                        <option value="CK-MB"> CK-MB </option>
                        <option value="MYOGLOBIN (MYO)"> MYOGLOBIN (MYO) </option>
                        <option value="ALPHA- FETOPROTIEN (AFP)"> ALPHA- FETOPROTIEN (AFP) </option>
                        <option value="PROSTATE SPECIFIC ANTIGEN (AFP)"> PROSTATE SPECIFIC ANTIGEN (AFP) </option>
                        <option value="FREE PROSTATE SPECIFIC ANTIGEN (FPSA)"> FREE PROSTATE SPECIFIC ANTIGEN (FPSA) </option>
                        <option value="CEA 125"> CEA 125 </option>
                        <option value="LUTEINIZING HORMONE (LH)"> LUTEINIZING HORMONE (LH) </option>
                        <option value="FOLLICULAR STIMULATING HORMONE (FSH)"> FOLLICULAR STIMULATING HORMONE (FSH) </option>
                        <option value="PROGESTERONE"> PROGESTERONE </option>
                        <option value="PROLACTIN (PRL)"> PROLACTIN (PRL) </option>
                        <option value="MICROALBUMIN"> MICROALBUMIN </option>
                        <option value="EXPANDED NEWBORN SCREENING"> EXPANDED NEWBORN SCREENING </option>
                        <option value="RAPID ANTIGEN TEST (SARS COV-2)"> RAPID ANTIGEN TEST (SARS COV-2) </option>
                        <option value=" PAP SMEAR"> PAP SMEAR </option>
                    </select>
                </div>

                
                <div class="form-group">
                    <label for="exampleInputPassword1">Amount</label>
                    <input type="number" class="form-control" name="amount" required>
                </div>
               
                <button type="submit" name="btn_add_services" class="btn btn-primary float-right mb-5">Add</button>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<?php

                        }

    ?>




<?php

    include('../include/footer.php');

?>




