<?php


include('security.php'); 

if($_SESSION['role'] != 2){

    header("Location: ../index.php");
    
}



//code for adding client
if (isset($_POST['btn_add_client'])){

    $lname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['lname'])));
    $fname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['fname'])));
    $mname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['mname'])));
    $suffix = mysqli_real_escape_string($connection, check_input(strtolower($_POST['suffix'])));
    $age = mysqli_real_escape_string($connection, check_input($_POST['age']));
    $address = mysqli_real_escape_string($connection, check_input($_POST['address']));


        if (!empty($flname) || !empty($fname) || !empty($age) || !empty($address)){

            $dupsql = "SELECT * FROM tbl_client WHERE (fname = '$fname' && mname = '$mname' && lname = '$lname' && suffix = '$suffix')";
            $duprow = mysqli_query($connection, $dupsql);

            if (mysqli_num_rows($duprow) > 0){
                $_SESSION['failed'] = "Client Already Exist!";
                header('Location: staff/index.php');

            }else{


                $query = "INSERT INTO tbl_client (lname, fname, mname, suffix, age, address) 
                            VALUES 
                        ('$lname','$fname','$mname','$suffix','$age', '$address')";

                $query_run = mysqli_query($connection, $query);


                if ($query_run){

                    $_SESSION['success'] = "Client Added Successfully!";
                    header('Location: staff/index.php');

                }else{

                    $_SESSION['failed'] = "Error Adding Client!";
                    header('Location: staff/index.php');
                }
            }
        
    }else{

        $_SESSION['failed'] = "Input Box not be empty!";
        header('Location: staff/index.php');

    }

}





//code for adding member
if (isset($_POST['btn_add_member'])){

    $family_id = mysqli_real_escape_string($connection, check_input($_POST['view_client']));
    $mlname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['mlname'])));
    $mfname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['mfname'])));
    $mmname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['mmname'])));
    $msuffix = mysqli_real_escape_string($connection, check_input(strtolower($_POST['msuffix'])));
    $relation = mysqli_real_escape_string($connection, check_input($_POST['relation']));

        if (!empty($flname) || !empty($fname) || !empty($relation)){

            $dupsql = "SELECT * FROM tbl_client WHERE fname = '$mfname' && mname = '$mmname' && lname = '$mlname' && suffix = '$msuffix'";
            $duprow = mysqli_query($connection, $dupsql);

            if (mysqli_num_rows($duprow) > 0){

                $_SESSION['failed'] = "Member Already Exist!";
                header('Location:staff/view_client.php?view_client='.$family_id);

            }else{


                $query = "INSERT INTO tbl_client (lname, fname, mname, suffix, head_family_id, age, relation, address) 
                            VALUES 
                        ('$mlname','$mfname','$mmname','$msuffix','$family_id','0','$relation','')";

                $query_run = mysqli_query($connection, $query);


                if ($query_run){

                    $_SESSION['success'] = "Member Added Successfully!";
                    header('Location: staff/view_client.php?view_client='.$family_id);

                }else{

                    $_SESSION['failed'] = "Error Adding Member!";
                    header('Location: staff/view_client.php?view_client='.$family_id);
                }
            }
        
    }else{

        $_SESSION['failed'] = "Input Box not be empty!";
        header('Location: staff/view_client.php?view_client='.$family_id);

    }

}




//code for adding services
if (isset($_POST['btn_add_services'])){

    $family_id = mysqli_real_escape_string($connection, check_input($_POST['view_client']));
    $client_or_member_id = mysqli_real_escape_string($connection, check_input(strtolower($_POST['client_or_member'])));
    $services = $_POST['services'];
    $otherServices = mysqli_real_escape_string($connection, check_input(strtolower($_POST['otherservices'])));
    $amount = mysqli_real_escape_string($connection, check_input($_POST['amount']));
    $services1 = implode(', ', $services);

    if(!empty($otherServices)){
        // $services1 = htmlspecialchars($services1 . ", " . $otherServices);
        $services1 = mysqli_real_escape_string($connection, check_input($services1 . ", " . $otherServices));
    }


        if (!empty($client_or_member_id) || !empty($services)){

                $query = "INSERT INTO tbl_services (client_id, member_id, services, amount) 
                            VALUES 
                        ('$family_id','$client_or_member_id','$services1','$amount')";

                $query_run = mysqli_query($connection, $query);


                if ($query_run){

                    $_SESSION['success'] = "Services Added Successfully!";
                    header('Location: staff/view_client.php?view_client='.$family_id);

                }else{

                    $_SESSION['failed'] = "Error Adding Services!";
                    header('Location: staff/view_client.php?view_client='.$family_id);
                }
        
            
        
    }else{

        $_SESSION['failed'] = "Input Box not be empty!";
        header('Location: staff/view_client.php?view_client='.$family_id);

    }

}



//code for update client
if (isset($_POST['btn_update_client'])){

    $client_id = mysqli_real_escape_string($connection, check_input(strtolower($_POST['edit_client'])));
    $lname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['lname'])));
    $fname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['fname'])));
    $mname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['mname'])));
    $suffix = mysqli_real_escape_string($connection, check_input(strtolower($_POST['suffix'])));
    $age = mysqli_real_escape_string($connection, check_input($_POST['age']));
    $address = mysqli_real_escape_string($connection, check_input($_POST['address']));


        if (!empty($lname) || !empty($fname) || !empty($age) || !empty($address)){

            $query = "UPDATE tbl_client SET lname ='$lname', fname = '$fname', mname = '$mname', suffix = '$suffix', age = '$age', address = '$address' WHERE id= '$client_id' LIMIT 1";

            $query_run = mysqli_query($connection,$query);

            if($query_run)
            {

                $_SESSION['success'] = "Client Updated Successfully";
                header('Location: staff/index.php');
            }
            else
            {
                $_SESSION['failed'] = "Error Updating Data";
                header('Location: staff/index.php');

            }   
        
    }else{

        $_SESSION['failed'] = "Input Box not be empty!";
        header('Location: staff/index.php');

    }

}



//code for update member
if (isset($_POST['btn_update_member'])){


    $family_id = mysqli_real_escape_string($connection, check_input($_POST['view_client']));
    $member_id = mysqli_real_escape_string($connection, check_input($_POST['view_member']));
    $mlname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['mlname'])));
    $mfname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['mfname'])));
    $mmname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['mmname'])));
    $msuffix = mysqli_real_escape_string($connection, check_input(strtolower($_POST['msuffix'])));
    $relation = mysqli_real_escape_string($connection, check_input($_POST['mrelation']));


    if (!empty($mlname) || !empty($mfname) || !empty($relation)){

        $query = "UPDATE tbl_client SET lname ='$mlname', fname = '$mfname', mname = '$mmname', suffix = '$msuffix',  relation = '$relation' WHERE id= '$member_id' LIMIT 1";

        $query_run = mysqli_query($connection,$query);

        if($query_run)
        {

            $_SESSION['success'] = "Member Updated Successfully";
            header('Location: staff/view_client.php?view_client='.$family_id);
        }
        else
        {
            $_SESSION['failed'] = "Error Updating Data";
            header('Location: staff/view_client.php?view_client='.$family_id);

        }   
    
    }else{

            $_SESSION['failed'] = "Input Box not be empty!";
            header('Location: staff/view_client.php?view_client='.$family_id);

        }

}




//code for update staff password
if (isset($_POST['btn_change_pwd'])) {

    $user_staff_id = mysqli_real_escape_string($connection, check_input($_POST['user_staff_id']));
    $user_staff_username = mysqli_real_escape_string($connection, check_input($_POST['user_staff_username']));
    $pwd = md5(mysqli_real_escape_string($connection, check_input($_POST['pwd'])));
    $pwd1 = md5(mysqli_real_escape_string($connection, check_input($_POST['pwd1'])));

        if (!empty($user_staff_id) && !empty($user_staff_username) && !empty($pwd) && !empty($pwd1)){

           if($pwd === $pwd1){
                
                $query = "UPDATE tbl_user SET password = '$pwd1' WHERE id = '$user_staff_id' && username = '$user_staff_username' LIMIT 1";

                $query_run = mysqli_query($connection,$query);
        
                if($query_run){
        
                    $_SESSION['success'] = "Password Updated Successfully";
                    header('Location: staff/account.php');

                }else{

                    $_SESSION['failed'] = "Error can't update/change password!";
                    header('Location: staff/account.php');
        
                }   

           }else{
                $_SESSION['failed'] = "Error can't update/change password!";
                header('Location: staff/account.php');
           }
            

        }

}




//validate data
function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}



