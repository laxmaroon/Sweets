<?php include('config/cust-session.php');

    session_destroy(); //Unsets $_SESSION['user']

    header('location:'.'index.html');
?>