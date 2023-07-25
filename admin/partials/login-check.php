<?php

    //Authorization
    if(!isset($_SESSION['user'])){
        //if user not logged in, redirect to login page
        $_SESSION['not-logged-in'] = '<div class="error text-center">Login to access Admin Panel</div>';
        header('location:'.'login.php');
    }

?>