<?php include('partials/menu.php'); 

    $query1 = "SELECT COUNT(*) as total_items FROM item;";
    $result1 = mysqli_query($con, $query1) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result1);
    $total_items = $row['total_items'];
    
    $query2 = "SELECT COUNT(*) as total_orders 
    FROM orders";
    $result2 = mysqli_query($con, $query2) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result2);
    $total_orders = $row['total_orders'];
    
    $query3 = "SELECT SUM(I.item_price*O.quantity) total_revenue
    FROM ITEM I JOIN
    (SELECT item_id, quantity
    FROM orders
    WHERE delivery = 1) O ON O.item_id = I.item_id;";
    $result3 = mysqli_query($con, $query3) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result3);
    $total_revenue = $row['total_revenue'];
    
    $query4 = "SELECT COUNT(*) total_staff
    FROM staff;";
    $result4 = mysqli_query($con, $query4) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result4);
    $total_staff = $row['total_staff'];
    

?>


    <div class="main-content">
        <div class="wrapper">
            <h1 class='text-center'>DASHBOARD</h1>
            
            <div class="col4 text-center">
                <h1><?php echo $total_items ?></h1>
                <br>
                Sweets
            </div>
            
            <div class="col4 text-center">
                <h1><?php echo $total_orders ?></h1>
                <br>
                Orders
            </div>
            
            <div class="col4 text-center">
                <h1><?php echo $total_revenue ?></h1>
                <br>
                Revenue
            </div>
            
            <div class="col4 text-center">
                <h1><?php echo $total_staff ?></h1>
                <br>
                Employees
            </div>

            <div class="clearfix"></div>
            
            <br><br><br>

            <h2>Inventory (items to prepare)</h2>
            <br>
            
            <a href="add-100.php?id=<?php echo$id;?>" class="btn-primary">Add 100</a> 
            
            <br><br>
            <table class='tableFull'>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>SKU</th>
                    <th>Quantity</th>
                </tr>
            <?php
                $query6 = "SELECT N.item_id, I.item_name, N.quantity, I.sku 
                FROM item I JOIN inventory N ON I.item_id = N.item_id
                WHERE N.quantity<100
                ORDER BY N.quantity;";
                $result6 = mysqli_query($con, $query6) or die(mysqli_error());

                if($result6==TRUE){
                    //Count no. of rows                        
                    $count = mysqli_num_rows($result6);
                    if($count>0){
                        while($rows = mysqli_fetch_assoc($result6)){
                            $item_id = $rows['item_id'];
                            $item_name = $rows['item_name'];
                            $sku = $rows['sku'];
                            $quantity = $rows['quantity'];
                            ?>


                            <tr>
                                <td><?php echo $item_id?></td>
                                <td><?php echo $item_name?></td>
                                <td><?php echo $sku?></td>
                                <td><?php echo $quantity?></td>
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