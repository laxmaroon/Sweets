<?php include('partials/menu.php') ?>

    <?php
        $id = $_GET['id'];

        $query = "SELECT * FROM admin where id=$id";
        $result = mysqli_query($con, $query) or die(mysqli_error());

        if($result==TRUE){

            $count = mysqli_num_rows($result);

            if($count==1){
                
                $row = mysqli_fetch_assoc($result);
                $name = $row['name'];
                $username = $row['username'];
                $password = $row['password'];

            } else{

                header('location:'.'manage-admin.php');
            }
        }
    ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>
            
            <br/><br/>
            
            <form action="" method="post">
                <table class="tbl30">
                    <tr>
                        <td>Name: </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $name ?>">
                        </td>
                    
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Password: </td>
                        <td>
                            <input type="password" name="password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST['submit'])){

            $id = $_POST['id'];
            $name = $_POST['name'];
            $username = $_POST['username'];
            $new_pass = md5($_POST['password']);
            
            if($new_pass == $password){

                //Create a SQL Query to Update Admin
                $query = "UPDATE admin SET
                name = '$name',
                username = '$username' 
                WHERE id='$id'
                ";
            
                //Execute the Query
                $result = mysqli_query($con, $query);

                if($result==TRUE) {
                    //Query Executed and Admin Updated
                    $_SESSION['updateAdmin'] = '<div class="success">Admin Updated Successfully.</div>';
                    //Redirect to Manage Admin Page
                    header('location:'.'manage-admin.php');
                }
                else {
                    //Failed to Update Admin
                    $_SESSION['updateAdmin'] = '<div class="error">Failed to update admin.</div>';
                    //Redirect to Manage Admin Page
                    header('location:'.'manage-admin.php');
                }
            }
            else{
                $_SESSION['updateAdmin'] = '<div class="error">Incorrect password</div>';
                header('location:'.'manage-admin.php');
            }
        }
    
    ?>

<?php include('partials/footer.php') ?>