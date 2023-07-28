<?php include('partials/menu.php');

    $add_id = $_GET['add_id'];

    $query = "SELECT *
    FROM address
    WHERE add_id = '$add_id';";

    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $del_add = $row['delivery_address'];
    $city = $row['delivery_city'];
    $pin = $row['delivery_zipcode'];

?>
    
<div class="main-content">
    <div class="wrapper">
        <h1>Customer Address</h1>

        <table class='tableFull'>
            <tr>
                <th>Delivery Address</th>
                <th>City</th>
                <th>Zipcode</th>
            </tr>
            <tr>
                <td><?php echo $del_add ?></td>
                <td><?php echo $city ?></td>
                <td><?php echo $pin ?></td>
            </tr>
        </table>

    </div>
</div>



<?php include('partials/footer.php'); ?>
