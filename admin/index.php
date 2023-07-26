<?php include('partials/menu.php'); 

    // $query = "SELECT COUNT(*) as total_items FROM item;";
    // $result = mysqli_query($con, $query);
    // $row = mysqli_fetch_assoc($result);
    // $total_items = $row['total_items'];

    // $query = "SELECT 
    // FROM 
    // WHERE delivery=1;";

    // $result = mysqli_query($con, $query);
    // $row = mysqli_fetch_assoc($result);
    // $total_orders = $row['total_orders'];
    // $total_revenue = $row['total_revenue'];

    

?>


    <div class="main-content">
        <div class="wrapper">
            <h1>DASHBOARD</h1>
            
            <div class="col4 text-center">
                <h1><?php //echo $total_items ?></h1>
                <br>
                Sweets
            </div>
            
            <div class="col4 text-center">
                <h1><?php //echo $total_orders ?></h1>
                <br>
                Orders
            </div>
            
            <div class="col4 text-center">
                <h1><?php //echo $total_revenue ?></h1>
                <br>
                Revenue
            </div>
            
            <div class="col4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>

            <div class="clearfix"></div>
        </div>    
    </div>
        
<?php include('partials/footer.php'); ?>