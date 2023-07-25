<?php include('partials/menu.php') ?>

<?php

    $id = $_GET['id'];
    $delivered = $_GET['delivered'];
    
    if($delivered){
        $_SESSION['delivery-message'] = '<div class="error">Order already delivered</div>';
        header('location:'.'manage-order.php');
    }

    else {    
        $query = "SELECT * FROM orders WHERE row_id=$id";

        $result = mysqli_query($con, $query) or die(mysqli_error());

        if($result==TRUE){
            $count = mysqli_num_rows($result);

            if($count==1){
                
                $query = "UPDATE orders 
                SET delivery = 1
                WHERE row_id = $id;";

                $result = mysqli_query($con, $query) or die(mysqli_error());

                if($result==TRUE){
                    $_SESSION['delivery-message'] = '<div class="success">Order delivered</div>';
                    header('location:'.'manage-order.php');
                } else {
                    $_SESSION['delivery-message'] = '<div class="error">Failed</div>';
                    header('location:'.'manage-order.php');
                }
            } else{
                $_SESSION['delivery-message'] = '<div class="error">Not found</div>';
                header('location:'.'manage-order.php');
            } 
        }
    }

?>

<?php include('partials/footer.php') ?>