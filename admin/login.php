<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Dakshina Delicacy</title>
        <link rel="stylesheet" href="css/adminlogin.css">
    </head>

    <body>
        
        <div class="login">
            <br><br>
            <h2 class="text-center">Admin Login</h2>
            <br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['not-logged-in']))
                {
                    echo $_SESSION['not-logged-in'];
                    unset($_SESSION['not-logged-in']);
                }
                // die('lol');
            ?>
            <br><br>
            <div class="container">
                <div class="myform">
                <form action="" method="post">
                    Username: <br>
                    <input type="text" name="username" placeholder="Enter Username"><br><br>

                    Password: <br>
                    <input type="password" name="password" placeholder="Enter Password"><br><br>

                    <input type="submit" name="submit" value="Login" class="btn-primary">
                    <br><br>
                </form>
                </div>
                <div class="image"> 
                    <img src="../images/iconAdmin.png" alt='Admin'>
                </div>
            </div>
        </div>
    </body>
</html>

<?php 

    if(isset($_POST['submit']))
    {
        //1. Get the Data from Login form
        $username = mysqli_real_escape_string($con, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($con, $raw_password);

        //check whether the user with username and password exists or not
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //Login Success
            $_SESSION['login'] = '<div class="success text-center">Login Successful.</div>';
            $_SESSION['admin'] = $username; //To check whether the user is logged in or not (logout will unset it)

            //Redirect to home page dashboard
            header('location:'.'index.php');
        }
        else
        {
            $message = "Username or Password is incorrect.\\nTry again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }

?>