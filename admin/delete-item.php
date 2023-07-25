<?php

    include('../config/constants.php');

    $id = $_GET['id'];
    $query = "DELETE FROM item WHERE item_id='$id'";
    $result = mysqli_query($con, $query) or die(mysqli_error());
    
    if($result==TRUE){
        $_SESSION['deleteItem'] = '<div class="success">Item deleted successfully!</div>';
        header('location:'.'manage-item.php');
    } 
    
    else{
        
        $_SESSION['deleteItem'] = '<div class="error">Failed to delete item.</div>';
        header('location:'.'manage-item.php');
    }
?>