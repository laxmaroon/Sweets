<?php include('partials/menu.php'); ?>

<div class="main-content">

    <div class="wrapper">
        <h1>Manage Customers</h1>

        <br>
        <br><br>

        <table class="tableFull">
            <tr>
                <th><pre>S.N  </pre></th>
                <th>First name</th>
                <th>Last name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php
                $query = "SELECT * 
                FROM customers;";
                $sn = 1;
                $result = mysqli_query($con, $query) or die(mysqli_error());

                if($result==TRUE){

                    $count = mysqli_num_rows($result);
                    if($count>0){
                        while($rows = mysqli_fetch_assoc($result)){
                            $cust_id = $rows['cust_id'];
                            $cust_fname = $rows['cust_fname'];
                            $cust_lname = $rows['cust_lname'];
                            $phone = $rows['phone'];
                            $email = $rows['email'];
                            $add_id = $rows['add_id'];
                        ?>
                        <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $cust_fname;?></td>
                            <td><?php echo $cust_lname;?></td>
                            <td><?php echo $phone;?></td>
                            <td><?php echo $email;?></td>
                            <td>
                                <a href="customer-address.php?add_id=<?php echo $add_id?>" class="btn-primary">Get customer address</a>
                                <a href="customer-orders.php?cust_id=<?php echo $cust_id?>" class="btn-secondary">Show customer orders</a>
                                <!-- <a href="address-details.php?add_id=<?php echo $add_id?>" class="btn-secondary">Show customer orders</a> -->
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


<?php include('partials/footer.php'); ?>