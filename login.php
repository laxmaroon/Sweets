<?php include('config/cust-session.php');

    if(isset($_SESSION['user'])){
        echo '<script>
            if(confirm("Already logged in. Do you want to log out?")==true){
                window.location.href="logout.php";
            } else window.location.href="index.html$menu";
        </script>';
    }
    $username = $_GET['name'];
    $raw_password = md5($_GET['password']);
    $password = mysqli_real_escape_string($con, $raw_password);

    $query = "SELECT email, password FROM customers
    WHERE email = '$username'";

    $result = mysqli_query($con, $query);
    if($result==TRUE){
        $count = mysqli_num_rows($result);

        if($count==0){
            $_SESSION['signup'] = '<div class="error">Create Account To Login</div>';
            header('location:signup.php');
            // die('lol');
        }else{
            $query = "SELECT email, password FROM customers
            WHERE email = '$username' AND password = '$password'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);
            
            if($password = $row['password']){
                // die('lol');
                $_SESSION['user'] = $username;
                header('location:index.html#menu');
            }
            else{
                // die('lol');
                $_SESSION['signup'] = '<div class="error">Incorrect Password</div>';
                header('location:signup.php');
            }
        }
    }

?>