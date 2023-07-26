<?php include('config/cust-session.php');

    $username = $_GET['name'];
    $pass = $_GET['password'];
    if($username=='' || $pass)
    $raw_password = md5($_GET['password']);
    $password = mysqli_real_escape_string($con, $raw_password);

    $query = "SELECT email, password FROM customers
    WHERE email = '$username'";

    $result = mysqli_query($con, $query);
    if($result==TRUE){
        if(mysqli_num_rows($result)==0){
            $_SESSION['signup'] = '<div class="error">Create Account To Login</div>';
            header('location:signup.php');
        }else{
            $row = mysqli_fetch_assoc($result);
            if($password = $row['password'])
                $_SESSION['user'] = $username;
            else{
                $_SESSION['signup'] = '<div class="error">Incorrect Password</div>';
            }
        }
    }
?>