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



//validate data
function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}



