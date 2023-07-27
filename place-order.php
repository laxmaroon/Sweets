<?php include('config/cust-session.php');

    $sku = $_GET['sku'];
    $size = $_GET['size'];
    $qty = $_GET['qty'];
    
    if ($size=="Large"){
        $sku=$sku.'L';

    }
    else{
        $sku=$sku.'R';
    }
    if(!isset($_SESSION['user'])){
        header("location:index.html#account");
    }

    $query="SELECT sku, item_id 
            FROM item
            WHERE sku='$sku';
            ";
    $result=mysqli_query($con, $query);
    if($result==TRUE){
        $count = mysqli_num_rows($result);
        if($count==0){
            header('location:index.html$menu');
        }
        $row=mysqli_fetch_assoc($result);
        $item_id = $row['item_id'];
        $user= $_SESSION['user'];
        
        $query="SELECT cust_id, add_id
                FROM customers
                WHERE $user=email;";
        $result2=mysqli_query($con, $query);
        if($result2==TRUE){
            
            $count = mysqli_num_rows($result2);
            if($count==0){
                header('location:index.html$menu');
            }
            $row=mysqli_fetch_assoc($result2);
            $cust_id=$row['cust_id'];
            $add_id=$row['add_id'];
        }
    }
?>
