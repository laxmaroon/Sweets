<?php include('partials/menu.php'); 

    $cust_id = $_GET['cust_id'];

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Customer Orders</h1>

        <table class='tableFull'>
            <tr>
                <th>Ordered at</th>
                <th>Item_ID</th>
                <th>Quantity</th>
                <th>Delivery Status</th>
            </tr>
            <?php
                $query = "SELECT created_at, item_id, quantity, delivery
                FROM orders
                WHERE cust_id = '$cust_id';";

                $result = mysqli_query($con, $query);
                if($result==TRUE){
                    $count = mysqli_num_rows($result);
                    if($count>0){
                        while($row = mysqli_fetch_assoc($result)){
                            $ordered_at = $row['created_at'];
                            $item_id = $row['item_id'];
                            $quantity = $row['quantity'];
                            $delivery = $row['delivery'];
                        ?>
                <tr>
                    <td><?php echo $ordered_at ?></td>
                    <td><?php echo $item_id ?></td>
                    <td><?php echo $quantity ?></td>
                    <td><?php echo $delivery ?></td>
                </tr>
                <?php
                        }
                    }
                }
            
            ?>

        </table>

    </div>
</div>



<?php include('partials/footer.php'); ?>
