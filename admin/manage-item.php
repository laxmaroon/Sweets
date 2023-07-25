<?php include('partials/menu.php') ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Items</h1>

            <?php
                if(isset($_SESSION['addItem'])){
                    echo $_SESSION['addItem'];
                    unset($_SESSION['addItem']);
                }

                if(isset($_SESSION['deleteItem'])){
                    echo $_SESSION['deleteItem'];
                    unset($_SESSION['deleteItem']);
                }

                if(isset($_SESSION['updateItem'])){
                    echo $_SESSION['updateItem'];
                    unset($_SESSION['updateItem']);
                }
                
            ?>
            <br><br>
            <a href="add-item.php" class="btn-primary">Add item</a>
            <br/><br/>

            <table class="tableFull">
                <tr>
                    <th>Item ID</th>
                    <th>sku</th>
                    <th>Item name</th>
                    <th>Item category</th>
                    <th>Item size</th>
                    <th>Item price</th>
                    <th>Actions</th>
                </tr>

                <?php

                    $query = "SELECT * FROM item";

                    $result = mysqli_query($con, $query) or die(mysqli_error());

                    if($result==TRUE){
                        //Count no. of rows                        
                        $count = mysqli_num_rows($result);
                        if($count>0){
                            while($rows = mysqli_fetch_assoc($result)){


                                $id = $rows['item_id'];
                                $sku = $rows['sku'];
                                $item_name = $rows['item_name'];
                                $item_cat = $rows['item_cat'];
                                $item_size = $rows['item_size'];
                                $item_price = $rows['item_price'];
                                
                                //display in table
                                ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $sku;?></td>
                                    <td><?php echo $item_name;?></td>
                                    <td><?php echo $item_cat;?></td>
                                    <td><?php echo $item_size;?></td>
                                    <td><?php echo $item_price;?></td>
                                    <td>
                                        <a href="update-item.php?id=<?php echo$id;?>" class="btn-secondary">Update Item</a> 
                                        <a href="delete-item.php?id=<?php echo $id;?>" class="btn-danger">Delete Item</a>
                                    </td>
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