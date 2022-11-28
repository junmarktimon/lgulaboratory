<?php


include('security.php'); 



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

    $last_household_id = 1;
    $lname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['lname'])));
    $fname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['fname'])));
    $mname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['mname'])));
    $suffix = mysqli_real_escape_string($connection, check_input(strtolower($_POST['suffix'])));
    $age = mysqli_real_escape_string($connection, check_input($_POST['age']));
    $address = mysqli_real_escape_string($connection, check_input($_POST['address']));

        $query1 = "SELECT household_id FROM tbl_client ORDER BY id DESC LIMIT 1";
        $query_run1 = mysqli_query($connection,$query1);

        if (mysqli_num_rows($query_run1) > 0){

            while($row = mysqli_fetch_assoc($query_run1)){
                
                $last_household_id = mysqli_real_escape_string($connection, check_input($row['household_id']));

            }

            ++$last_household_id;
        }


        if (!empty($flname) || !empty($fname) || !empty($age) || !empty($address)){

            $dupsql = "SELECT * FROM tbl_client WHERE (household_id = '$last_household_id' || (fname = '$fname' && mname = '$mname' && lname = '$lname'))";
            $duprow = mysqli_query($connection, $dupsql);

            if (mysqli_num_rows($duprow) > 0){
                $_SESSION['failed'] = "Client Already Exist!";
                header('Location: admin/index.php');

            }else{


                $query = "INSERT INTO tbl_client (household_id, lname, fname, mname, suffix, age, address) 
                            VALUES 
                        ('$last_household_id','$lname','$fname','$mname','$suffix','$age', '$address')";

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
    $family_name = mysqli_real_escape_string($connection, check_input($_POST['view_client_name']));
    $mlname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['mlname'])));
    $mfname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['mfname'])));
    $mmname = mysqli_real_escape_string($connection, check_input(strtolower($_POST['mmname'])));
    $msuffix = mysqli_real_escape_string($connection, check_input(strtolower($_POST['msuffix'])));
    $relation = mysqli_real_escape_string($connection, check_input($_POST['relation']));

        if (!empty($flname) || !empty($fname) || !empty($relation)){

            $dupsql = "SELECT * FROM tbl_household_member WHERE fname = '$mfname' && mname = '$mmname' && lname = '$mlname'";
            $duprow = mysqli_query($connection, $dupsql);

            if (mysqli_num_rows($duprow) > 0){

                $_SESSION['failed'] = "Member Already Exist!";
                header('Location:admin/view_client.php?view_client='.$family_id);

            }else{


                $query = "INSERT INTO tbl_household_member (head_family_id, lname, fname, mname, suffix, client_relation) 
                            VALUES 
                        ('$family_id','$mlname','$mfname','$mmname','$msuffix','$relation')";

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









//validate data
function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}



