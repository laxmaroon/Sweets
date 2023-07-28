<?php
    include('../config/constants.php');

    session_destroy(); //Unsets $_SESSION['admin']

    header('location:'.'login.php');
?>