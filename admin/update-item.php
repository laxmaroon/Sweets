<?php include('partials/menu.php') ?>

<?php
        $id = $_GET['id'];

        $query = "SELECT * FROM item where item_id='$id'";
        $result = mysqli_query($con, $query) or die(mysqli_error());

        if($result==TRUE){

            $count = mysqli_num_rows($result);

            if($count==1){
                
                $row = mysqli_fetch_assoc($result);
                $sku = $row['sku'];
                $item_name = $row['item_name'];
                $item_cat = $row['item_cat'];
                $item_size = $row['item_size'];
                $item_price = $row['item_price'];
                

            } else{

                header('location:'.'manage-admin.php');
            }
        }
    ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Item</h1>
            
            <br/><br/>
            
            <form action="" method="post">
                <table class="tbl30">
                    <tr>
                        <td>Item ID: </td>
                        <td>
                            <input type="text" name="id" value="<?php echo $id ?>" onfocus="this.blur()">
                        </td>
                    
                    <tr>
                        <td>SKU: </td>
                        <td>
                            <input type="text" name="sku" value="<?php echo $sku?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Name: </td>
                        <td>
                            <input type="text" name="item_name" value="<?php echo $item_name?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Category: </td>
                        <td>
                            <input type="text" name="item_cat" value="<?php echo $item_cat?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Size: </td>
                        <td>
                            <input type="text" name="item_size" value="<?php echo $item_size?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="number" name="item_price" value="<?php echo $item_price?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST['submit'])){
            
            $id = $_POST['id'];
            $sku = $_POST['sku'];
            $item_name = $_POST['item_name'];
            $item_cat = $_POST['item_cat'];
            $item_size = $_POST['item_size'];
            $item_price = $_POST['item_price'];

            //Query to update item
            $query = "UPDATE item SET
            sku = '$sku', 
            item_name = '$item_name',
            item_cat = '$item_cat',
            item_size = '$item_size',
            item_price = $item_price
            WHERE item_id='$id'
            ";
        
            $result = mysqli_query($con, $query);

            if($result==TRUE) {
                $_SESSION['updateItem'] = '<div class="success">Item updated successfully.</div>';
                //Redirect to Manage Item Page
                header('location:'.'manage-item.php');
            }
            else {
                $_SESSION['updateAdmin'] = '<div class="error">Failed to update item.</div>';
                header('location:'.'manage-item.php');
            }
        }
    
    ?>

<?php include('partials/footer.php') ?>