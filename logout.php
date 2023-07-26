<?php
    include('../config/cust_session.php');

    session_destroy(); //Unsets $_SESSION['user']

    $signup = $_GET['signup'];
    if($signup=='true'){
        header('location:signup.php');
    }

    header('location:'.'index.html');
?>