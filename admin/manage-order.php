    <?php include('partials/menu.php') ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Orders</h1>

            <?php

                if(isset($_SESSION['updateOrder'])){
                    echo $_SESSION['updateOrder'];
                    unset($_SESSION['updateOrder']);
                }
                
                if(isset($_SESSION['delivery-message'])){
                    echo $_SESSION['delivery-message'];
                    unset($_SESSION['delivery-message']);
                }
                
            ?>
            <br>
            <br><br>

            <table class="tableFull">
                <tr>
                    <th><pre>S.N  </pre></th>
                    <th>Created at</th>
                    <th>Item ID</th>
                    <th>Quantity</th>
                    <th>Customer ID</th>
                    <th>Delivery Status</th>
                    <th>Address ID</th>
                    <th>Action(s)</th>
                </tr>
                <?php
                    //Get all order details

                    $query = "SELECT * FROM orders";
                    $sn = 1;
                    $result = mysqli_query($con, $query) or die(mysqli_error());

                    if($result==TRUE){

                        $count = mysqli_num_rows($result);
                        if($count>0){
                            while($rows = mysqli_fetch_assoc($result)){

                                $id = $rows['row_id'];
                                $created_at = $rows['created_at'];
                                $item_id = $rows['item_id'];
                                $qty = $rows['quantity'];
                                $cust_id = $rows['cust_id'];
                                $delivery = $rows['delivery'];
                                $add_id = $rows['add_id'];
                                
                                //display in table
                ?>
                <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $created_at ?></td>
                    <td><?php echo $item_id ?></td>
                    <td><?php echo $qty ?></td>
                    <td><?php echo $cust_id ?></td>
                    <td><?php echo $delivery ?></td>
                    <td><?php echo $add_id ?></td>
                    <td>
                        <a href="delivered.php?id=<?php echo $id?>&delivered=<?php echo $delivery?>" class="btn-secondary">Mark as delivered</a> 
                    </td>
                    <!-- <a href="update-order.php?id=<?php echo $id?>&delivered=<?php echo $delivery?>" class="btn-primary">Update Order</a>  -->
                        <!-- <a href="#" class="btn-danger">Delete Order</a></td> -->
                </tr>
                <?php
                            }
                        }
                    }
                ?>
            </table>
        </div>    
    </div>

<?php include('partials/footer.php') ?>