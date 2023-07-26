<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="js/custom.js"></script> -->
    <!-- <link rel="stylesheet" href="css/order.css"> -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!-- <link rel="stylesheet" href="css/custom.css"> -->
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap">
    

    <title>SignUp. DD</title>
</head>
<body>
    <?php include('config/cust-session.php');
    
    if(isset($_SESSION['user'])){
        echo '<script>
            if(confirm("Already logged in. Do you want to log out?")==true){
                window.location.href="signup.php?logout=true";
            } else window.location.href="index.html";
        </script>';
    }

    $logout = $_GET['logout'];
    if($logout=='true')
        header('location:logout.php?signup=true');

    $fnameErr = $lnameErr = $addErr = $emailErr = $passErr = $passErr = '';
    $fname = $lname = $address = $email = $password = $confirmPassword = ''; 

    if(isset($_POST['submit'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zipcode = $_POST['zipcode'];
        $valid = 1;
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if(empty($fname)){
            $fnameErr = "*First Name is required. Tell us who you are !";
            $valid = 0;
        }
        else{
            test_input($fname);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
                $fnameErr = "*Only letters and white space allowed";
                $valid = 0;
            }
        }

        if(empty($lname)){
            $lnameErr = "*Last Name is required";
            $valid = 0;
        }
        else{
            test_input($lname);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
                $lnameErr = "*Only letters and white space allowed";
                $valid = 0;
            }
        }

        
        if(empty($email)){
            $emailErr = "*Email is required";
            $valid = 0;
        }
        else{
            test_input($email);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "*Invalid email format";
                $valid = 0;
            }
        }

        if(empty($password)){
            $passErr = "*You need a password";
            $valid = 0;
        }
        else{
            if(strlen($password)<4){
                $passErr = "*Enter at least 4 characters";
                $valid = 0;
            }
        }
        
        if(empty($confirmPassword)){
            $passErr = "*Kindly confirm your password";
            $valid = 0;
        }
        else{
            if($password != $confirmPassword){
                $passErr = "*Passwords do not match";
                $valid = 0;
            }
        }
        
        if(empty($phone)){
            $phoneErr = "*Enter your phone number";
            $valid = 0;
        }

        if(empty($address)){
            $addErr = "*Address is required, if you want sweets to be delivered !";
            $valid = 0;
        }
        else{
            test_input($address);
        }
        

        $query = "SELECT * FROM customers
        WHERE email='$email';";
        $result = mysqli_query($con, $query);
        if($result==TRUE){
            if(mysqli_num_rows($result) == 1){
                $_SESSION['signup'] = '<div class="error">Account already exists with the Email ID</div>';
                $valid = 0;
            }
        }

        if($valid){
            $query = "INSERT INTO address(delivery_address, delivery_city, delivery_zipcode) VALUES
            ('$address', '$city', $zipcode);";
            
            $result = mysqli_query($con, $query) or die(mysqli_error());
            $add_id = mysqli_insert_id($con);

            if($result==TRUE){
                $password = md5($confirmPassword);
                $query = "INSERT INTO customers(cust_fname, cust_lname, phone, email, password, add_id) VALUES
                ('$fname', '$lname', '$phone', '$email', '$password', '$add_id');";

                $result2 = mysqli_query($con, $query) or die(mysqli_error());

                if($result2==TRUE){
                    $_SESSION['user'] = $email;
                    header('location:'.'index.html');
                } else{
                    $_SESSION['signup'] = '<div class="error">Sign up Failed</div>';
                    header('location:'.'signup.php');
                }
            }
        }
    }

    mysqli_close($con);
    ?>

    <header>
        <a href="index.html"><h1><span class="logo"><img src="images\type-1.png"></span>  Dakshina Delicacy</h1></a>
    </header>
    
    <div class="container">
    <?php
        if(isset($_SESSION['signup'])){
            echo $_SESSION['signup'];
            unset($_SESSION['signup']);
        }
        ?>
        <h4>
            Already have an account?
            <a href="index.html#account"><button type="button" class="login">Login</button></a>
        </h4>
        <h2>Sign Up</h2>
        <div class="font-fam">

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <label for="fname">First Name <span class="error"><?php echo $fnameErr ?></span></label>
            <input type="text" id="fname" name="fname" maxlength="50" required value="<?php echo htmlspecialchars($_POST['fname'] ?? '', ENT_QUOTES); ?>">
            <br>

            <label for="lname">Last Name <span class="error"><?php echo $lnameErr ?></span></label>
            <input type="text" id="lname" name="lname" maxlength="50" required value="<?php echo htmlspecialchars($_POST['lname'] ?? '', ENT_QUOTES); ?>">
            <br>

            <label for="email">Email <span class="error"><?php echo $emailErr ?></span></label>
            <input type="email" id="email" name="email" required >
            <br>
            
            <label for="password">Create Password <span class="error"><?php echo $passErr ?></span></label>
            <input type="password" id="password" name="password" required>
            <br>
            
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
            <br>
            
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" maxlength="10" pattern='[6-9]{1}[0-9]{9}' title='10 digit mobile number' required value="<?php echo htmlspecialchars($_POST['phone'] ?? '', ENT_QUOTES); ?>">
            <br>
            
            <label for="address">Address</label>
            <input type="text" id="address" name="address" maxlength="200" required value="<?php echo htmlspecialchars($_POST['address'] ?? '', ENT_QUOTES); ?>">
            <br>

            <label for="city">City</label>
            <input type="text" name="city" id="city" maxlength="50" required value="<?php echo htmlspecialchars($_POST['city'] ?? '', ENT_QUOTES); ?>">
            <br>

            <label for="zipcode">Zipcode</label>
            <input type="text" name="zipcode" id="zipcode" pattern='[1-9]{1}[0-9]{5}' title='6 digit PIN CODE' maxlength="50" required value="<?php echo htmlspecialchars($_POST['zipcode'] ?? '', ENT_QUOTES); ?>">
            <br>

            <button type="submit" name='submit' class="sign-up-btn" onclick=form.submit()>Sign Up</button>
            <a href="index.html"><button type="button" class="go-back-btn">Home</button></a>
        </form>
        </div>
    </div>
</body>
</html>



