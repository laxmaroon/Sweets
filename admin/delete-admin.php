<?php

    include('../config/constants.php');

    $id = $_GET['id'];
    $query = "DELETE FROM admin WHERE id=$id";
    $result = mysqli_query($con, $query) or die(mysqli_error());
    
    if($result==TRUE){
        $_SESSION['deleteAdmin'] = '<div class="success">Admin deleted successfully!</div>';
        header('location:'.'manage-admin.php');
    } 
    
    else{
        
        $_SESSION['deleteAdmin'] = '<div class="error">Failed to delete admin.</div>';
        header('location:'.'manage-admin.php');
    }
?>