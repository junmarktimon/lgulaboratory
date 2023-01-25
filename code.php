<?php


include('security.php'); 



if($_SESSION['role'] != 1){

    header("Location: ../index.php");
    
}



//code for login
if (isset($_POST['btn_login'])) 
{

    $username_login = mysqli_real_escape_string($connection, check_input($_POST['username']));
    $password_login = md5(mysqli_real_escape_string($connection, check_input($_POST['password'])));

        if (!empty($username_login) && !empty($password_login)) 
        {
                    
                    $query = "SELECT * FROM tbl_user WHERE username = '$username_login' AND password ='$password_login'";
                    

                    $query_run = mysqli_query($connection, $query);

                    if (mysqli_num_rows($query_run) > 0) 
                    {
                        
                        $row = mysqli_fetch_assoc($query_run);
                        $_SESSION['role'] = $row['role'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['id'] = $row['id'];

                        if ($_SESSION["role"] == 1) 
                        {
                            // $query_run1 = mysqli_query($connection,$query1);
                            // $his_data = "Admin Login Successfully!";
                            // $query1 = "INSERT INTO tbl_history (user_role, id, description) VALUES ('1','$idrole','$his_data')";
                            // $query_run1 = mysqli_query($connection,$query1);

                            $_SESSION['username'] = $username_login;
                            $_SESSION['role'];
                            $_SESSION['id'];
                            header("Location:admin");
                            exit;
                        } else 
                        {
                            

                            $_SESSION['username'] = $username_login;
                            $_SESSION['role'];
                            $_SESSION['id'];
                            header("Location:staff");
                            exit;
                        }

                    }else 
                    {
                        
                        $_SESSION['status'] = "Username/Password is Invalid!";
                        header('Location: index.php');
                    }
        } else 
        {

            $_SESSION['status'] = "Username/Password not be Empty!";
            header('Location: index.php');
        }


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
                header('Location: admin/index.php');

            }else{


                $query = "INSERT INTO tbl_client (lname, fname, mname, suffix, age, address) 
                            VALUES 
                        ('$lname','$fname','$mname','$suffix','$age', '$address')";

                $query_run = mysqli_query($connection, $query);


                if ($query_run){

                    $_SESSION['success'] = "Client Added Successfully!";
                    header('Location: admin/index.php');

                }else{

                    $_SESSION['failed'] = "Error Adding Client!";
                    header('Location: admin/index.php');
                }
            }
        
    }else{

        $_SESSION['failed'] = "Input Box not be empty!";
        header('Location: admin/index.php');

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
                header('Location:admin/view_client.php?view_client='.$family_id);

            }else{


                $query = "INSERT INTO tbl_client (lname, fname, mname, suffix, head_family_id, age, relation, address) 
                            VALUES 
                        ('$mlname','$mfname','$mmname','$msuffix','$family_id','0','$relation','')";

                $query_run = mysqli_query($connection, $query);


                if ($query_run){

                    $_SESSION['success'] = "Member Added Successfully!";
                    header('Location: admin/view_client.php?view_client='.$family_id);

                }else{

                    $_SESSION['failed'] = "Error Adding Member!";
                    header('Location: admin/view_client.php?view_client='.$family_id);
                }
            }
        
    }else{

        $_SESSION['failed'] = "Input Box not be empty!";
        header('Location: admin/view_client.php?view_client='.$family_id);

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
                    header('Location: admin/view_client.php?view_client='.$family_id);

                }else{

                    $_SESSION['failed'] = "Error Adding Services!";
                    header('Location: admin/view_client.php?view_client='.$family_id);
                }
        
            
        
    }else{

        $_SESSION['failed'] = "Input Box not be empty!";
        header('Location: admin/view_client.php?view_client='.$family_id);

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
                header('Location: admin/index.php');
            }
            else
            {
                $_SESSION['failed'] = "Error Updating Data";
                header('Location: admin/index.php');

            }   
        
    }else{

        $_SESSION['failed'] = "Input Box not be empty!";
        header('Location: admin/index.php');

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
            header('Location: admin/view_client.php?view_client='.$family_id);
        }
        else
        {
            $_SESSION['failed'] = "Error Updating Data";
            header('Location: admin/view_client.php?view_client='.$family_id);

        }   
    
    }else{

            $_SESSION['failed'] = "Input Box not be empty!";
            header('Location: admin/view_client.php?view_client='.$family_id);

        }

}



//code for delete member
if (isset($_POST['btn_delete_member'])){


    $family_id = mysqli_real_escape_string($connection, check_input($_POST['view_client']));
    $delete_member_id = mysqli_real_escape_string($connection, check_input($_POST['delete_member_id']));


    if (!empty($delete_member_id)){

        // $query = "DELETE FROM tbl_student WHERE id ='$delete_id'";
        $query = "DELETE tbl_client, tbl_services FROM tbl_client INNER JOIN tbl_services
                    WHERE tbl_client.id = '$delete_member_id' && tbl_services.member_id = '$delete_member_id'";
        $query_run = mysqli_query($connection,$query);

            
        if ($query_run) {
         
            $_SESSION['success'] = "Member Deleted Successfully!";
            header('Location: admin/view_client.php?view_client='.$family_id);
        } else {

            $_SESSION['failed'] = "Error Deleting Member data!";
            header('Location: admin/view_client.php?view_client='.$family_id);
        }
        
    }

}




//code for delete client
if (isset($_POST['btn_delete_client'])){


    $delete_client_id = mysqli_real_escape_string($connection, check_input($_POST['delete_client_id']));


    if (!empty($delete_client_id)){

        $query = "DELETE FROM tbl_client WHERE id = '$delete_client_id' OR head_family_id = '$delete_client_id'";
        $query_run = mysqli_query($connection,$query);

            
        if ($query_run) {

            $query1 = "DELETE FROM tbl_services WHERE client_id = '$delete_client_id'";
            $query_run1 = mysqli_query($connection,$query1);
         
            $_SESSION['success'] = "Client Deleted Successfully!";
            header('Location: admin');
        } else {

            $_SESSION['failed'] = "Error Deleting Client data!";
            header('Location: admin');
        }
        
    }

}





//code for update admin password
if (isset($_POST['btn_change_pwd'])) {

    $admin_id = mysqli_real_escape_string($connection, check_input($_POST['admin_id']));
    $admin_username = mysqli_real_escape_string($connection, check_input($_POST['admin_username']));
    $uname = mysqli_real_escape_string($connection, check_input($_POST['uname']));
    $pwd = md5(mysqli_real_escape_string($connection, check_input($_POST['pwd'])));
    $pwd1 = md5(mysqli_real_escape_string($connection, check_input($_POST['pwd1'])));

        if (!empty($uname) && !empty($uname) && !empty($uname) && !empty($pwd) && !empty($pwd1)){

            
            

        }

}



//code for filter services
// if (isset($_POST['btn_filter'])) {

//     $from = mysqli_real_escape_string($connection, check_input($_POST['from']));
//     $to =mysqli_real_escape_string($connection, check_input($_POST['to']));

//     echo $from;
//     echo "</br>";
//     echo $to;

//     die();

//         if (!empty($from) && !empty($to)){

            

//         }

// }










//validate data
function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}



