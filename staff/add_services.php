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


?>

<?php

    if(isset($_POST['btn_addservices'])){

        $services_client_id = mysqli_real_escape_string($connection, check_input($_POST['edit_services_client_id']));

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 mt-5 bg-light border border-light rounded">
            <h3 class="text-center mt-5"> Add Services</h3>
            <form class="mt-5" action="../code1.php" method="post">

                <input type="hidden" class="form-control" id="editInput_family_id1" name="view_client" value="<?php echo htmlspecialchars($services_client_id); ?>">



                <?php

                    $query= "SELECT * FROM tbl_client WHERE head_family_id = '$services_client_id' || id = '$services_client_id'";
                    $query_run = mysqli_query($connection,$query);

                ?>

                <div class="form-group" >
                    <label for="exampleFormControlSelect1" style="font-weight:bold;">Name</label>
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
                    <label for="exampleInputPassword1" style="font-weight:bold;">Services</label> <br>

                    <table>
                        <tbody>
                            <tr>
                                <td style="width:3%;"> <input type="checkbox" class="checkbox-inline" name="services[]" value="CBC"> CBC </td>
                                <td style="width:3%;"> <input type="checkbox" class="checkbox-inline" name="services[]" value="URINALYSIS"> URINALYSIS </td>
                                <td style="width:4%;"> <input type="checkbox" class="checkbox-inline" name="services[]" value="FECALYSIS"> FECALYSIS </td>
                                <td style="width:4%;"> <input type="checkbox" class="checkbox-inline" name="services[]" value="BLOOD TYPING"> BLOOD TYPING </td>
                            </tr>
                            <tr>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="PREGNANCY TEST"> PREGNANCY TEST </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="HBsAg (ICT)"> HBsAg (ICT) </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="SYPHILIS"> SYPHILIS </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="HIV 1/2"> HIV 1/2 </td>
                            </tr>
                            <tr>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="GRAM STAINING"> GRAM STAINING </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="FASTING BLOOD SUGAR"> FASTING BLOOD SUGAR </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="CHOLESTEROL (TOTAL)"> CHOLESTEROL (TOTAL) </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="HDL DIRECT CHOLE"> HDL DIRECT CHOLE </td>
                            </tr>
                            <tr>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="LDL DIRECT CHOLE"> LDL DIRECT CHOLE </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="TRIGLYCERIDES"> TRIGLYCERIDES </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="LIPID PROFILE"> LIPID PROFILE </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="BLOOD URIC ACID"> BLOOD URIC ACID </td>
                            </tr>
                            <tr>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="SERUM CRATININE"> SERUM CRATININE </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="BLOOD UREA NITROGREN"> BLOOD UREA NITROGREN </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="SGPT/ ALT"> SGPT/ ALT </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="SGOT/ AST"> SGOT/ AST </td>
                            </tr>
                            <tr>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="ALP"> ALP </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="TOTAL PROTIEN"> TOTAL PROTIEN </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="ALBUMIN"> ALBUMIN </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="TPAG"> TPAG </td>
                            </tr>
                            <tr>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="TOTAL BILIRUBIN"> TOTAL BILIRUBIN </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="TB DB"> TB DB </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="SERUM SODIUM"> SERUM SODIUM </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="SERUM POTASSIUM"> SERUM POTASSIUM </td>
                            </tr>
                            <tr>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="HgbAc"> HgbAc </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="75 gms OGTT"> 75 gms OGTT </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="100 gms OGTT"> 100 gms OGTT </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="TSH"> TSH </td>
                            </tr>
                            <tr>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="T3"> T3 </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="T4"> T4 </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="FT3"> FT3 </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="FT4"> FT4 </td>
                            </tr>
                            <tr>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="C-REACTIVE PROTIEN"> C-REACTIVE PROTIEN </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="TROPONIN I"> TROPONIN I </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="NT PRO- BRAIN"> NT PRO- BRAIN </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="NATRIURETIC PEPTIDE"> NATRIURETIC PEPTIDE </td>
                            </tr>
                        </tbody><tr>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="(NT- pro- BNP)"> (NT- pro- BNP) </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="D- DIMER"> D- DIMER </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="CK-MB"> CK-MB </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="MYOGLOBIN (MYO)"> MYOGLOBIN (MYO) </td>
                            </tr>
                            <tr>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="ALPHA- FETOPROTIEN (AFP)"> ALPHA- FETOPROTIEN (AFP) </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="PROSTATE SPECIFIC ANTIGEN (AFP)"> PROSTATE SPECIFIC ANTIGEN (AFP) </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="FREE PROSTATE SPECIFIC ANTIGEN (FPSA)"> FREE PROSTATE SPECIFIC ANTIGEN (FPSA) </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="CEA 125"> CEA 125 </td>
                            </tr>
                            <tr>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="LUTEINIZING HORMONE (LH)"> LUTEINIZING HORMONE (LH) </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="FOLLICULAR STIMULATING HORMONE (FSH)"> FOLLICULAR STIMULATING HORMONE (FSH) </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="PROGESTERONE"> PROGESTERONE </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="PROLACTIN (PRL)"> PROLACTIN (PRL) </td>
                            </tr>
                            <tr>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="MICROALBUMIN"> MICROALBUMIN </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="EXPANDED NEWBORN SCREENING"> EXPANDED NEWBORN SCREENING </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="RAPID ANTIGEN TEST (SARS COV-2)"> RAPID ANTIGEN TEST (SARS COV-2) </td>
                                <td> <input type="checkbox" class="checkbox-inline" name="services[]" value="PAP SMEAR"> PAP SMEAR </td>
                            </tr>
                    </table>

                <div class="form-group">
                    <label for="exampleInputPassword1" style="font-weight:bold;">Other Services</label>
                    <input type="text" class="form-control" name="otherservices">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1" style="font-weight:bold;">Amount</label>
                    <input type="number" class="form-control" name="amount" required>
                </div>
               
                <button type="submit" name="btn_add_services" class="btn btn-primary float-right mb-5">Add</button>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<?php

                        }

    ?>




<?php

    include('footer.php');

    // Close the connection
mysqli_close($connection); 

?>




