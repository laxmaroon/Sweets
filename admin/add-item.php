<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Item</h1>
        <br/>

        <?php
                if(isset($_SESSION['addItem'])){
                    echo $_SESSION['addItem'];
                    unset($_SESSION['addItem']);   //remove session message
                }
            ?>
        <br/><br/>

        <form action="" method="post">
            <table class="table30">
                <tr>

                    <td>Item ID: </td>
                    <td><input type="text" name="id"></td>

                </tr>
                <tr>

                    <td>SKU: </td>
                    <td><input type="text" name="sku"></td>
                    
                </tr>
                <tr>

                    <td>Item Name: </td>
                    <td><input type="text" name="item_name"></td>
                    
                </tr>
                <tr>

                    <td>Item Category: </td>
                    <td><input type="text" name="item_cat"></td>
                    
                </tr>
                <tr>

                    <td>Item size</td>
                    <td><input type="text" name="item_size"></td>
                    
                </tr>
                <tr>

                    <td>Item price</td>
                    <td><input type="text" name="item_price"></td>

                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add item" class='btn-secondary'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>        

<?php include('partials/footer.php'); ?>


<?php

if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $sku = $_POST['sku'];
    $item_name = $_POST['item_name'];
    $item_cat = $_POST['item_cat'];
    $item_size = $_POST['item_size'];
    $item_price = $_POST['item_price'];

    $query = "SELECT * FROM item WHERE item_id='$id'";
    $result = mysqli_query($con, $query) or die(mysqli_error());
    
    if(mysqli_num_rows($result)){
        $_SESSION['addItem'] = '<div class="error">Duplicate item ID</div>';
        header('location:'.'add-item.php');
    }

    else{
        $query = "INSERT INTO item VALUES
        ('$id','$sku','$item_name','$item_cat','$item_size',$item_price);";

        $result = mysqli_query($con, $query) or die(mysqli_error());
        if($result==TRUE){
            $_SESSION['addItem'] = '<div class="success">Item added successfully!</div>';
            header('location:'.'manage-item.php');
        }
        else{
            $_SESSION['addItem'] = '<div class="error">Failed to add item</div>';
            header('location:'.'add-item.php');
        }
    }
}


?>