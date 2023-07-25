<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br/><br/>
            <?php
                if(isset($_SESSION['addAdmin'])){
                    echo $_SESSION['addAdmin'];
                    unset($_SESSION['addAdmin']);   //remove session message
                }
            ?>
        <br/><br/>

        <form action="" method="post">
            <table class="table30">
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="name" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Enter your username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter your password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include('partials/footer.php'); ?>


<?php

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $query = "INSERT INTO admin (name, username, password) VALUES('$name', '$username', '$password');";
        
        $result = mysqli_query($con, $query) or die(mysqli_error());
        
        if($result == TRUE){
            //Session variable to display success
            $_SESSION['addAdmin'] = '<div class="success">Added successfully!</div>';
            //Redirect page
            header('location:'.'manage-admin.php');
        }
        else{
            $_SESSION['addAdmin'] = '<div class="error">Failed to add</div>';
            header('location:'.'add-admin.php');
        }
    }

?>