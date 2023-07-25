<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="post">
            <table class="tbl30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php 

            //Check whether the Submit Button is Clicked on Not
            if(isset($_POST['submit']))
            {
                //1. Get the DAta from Form
                $id=$_POST['id'];
                $current_password = md5($_POST['current_password']);
                $new_password = md5($_POST['new_password']);
                $confirm_password = md5($_POST['confirm_password']);


                //2. Check whether the user with current ID and Current Password Exists or Not
                $query = "SELECT * FROM admin WHERE id=$id AND password='$current_password'";

                //Execute the Query
                $result = mysqli_query($con, $query);

                if($result==true)
                {
                    //Check whether data is available or not
                    $count=mysqli_num_rows($result);

                    if($count==1)
                    {
                        //User exists and password can be changed
                        //Check whether the new password and confirm match or not
                        if($new_password==$confirm_password)
                        {
                            //Update the password
                            $sql2 = "UPDATE admin SET 
                                password='$new_password' 
                                WHERE id=$id
                            ";

                            $result2 = mysqli_query($con, $sql2);

                            if($result2==true)
                            {
                                $_SESSION['change-pwd-Admin'] = '<div class="success">Password Changed Successfully </div>';
                                header('location:'.'manage-admin.php');
                            }
                            else
                            {
                                $_SESSION['change-pwd-Admin'] = '<div class="error">Failed to Change Password </div>';
                                header('location:'.'manage-admin.php');
                            }
                        }
                        else
                        {
                            //Redirect to manage-admin page with error message
                            $_SESSION['change-pwd-Admin'] = '<div class="error">Passwords do not match </div>';
                            header('location:'.'manage-admin.php');

                        }
                    }
                    else
                    {
                        //User does not exist
                        $_SESSION['change-pwd-Admin'] = '<div class="error">Incorrect password </div>';
                        header('location:'.'manage-admin.php');
                    }
                }
            }
?>

<?php include('partials/footer.php'); ?>