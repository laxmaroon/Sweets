<?php include('partials/menu.php'); ?>
    
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Administrator</h1>

            <?php
                if(isset($_SESSION['addAdmin'])){
                    echo $_SESSION['addAdmin'];
                    unset($_SESSION['addAdmin']);
                }

                if(isset($_SESSION['deleteAdmin'])){
                    echo $_SESSION['deleteAdmin'];
                    unset($_SESSION['deleteAdmin']);
                }

                if(isset($_SESSION['updateAdmin'])){
                    echo $_SESSION['updateAdmin'];
                    unset($_SESSION['updateAdmin']);
                }

                if(isset($_SESSION['change-pwd-Admin'])){
                    echo $_SESSION['change-pwd-Admin'];
                    unset($_SESSION['change-pwd-Admin']);
                }
                
            ?>

            <br/><br/>
            <a href="add-admin.php" class="btn-primary">Add admin</a>
            <br/><br/>

            <table class="tableFull">
                <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                    //Get all admin details

                    $query = "SELECT * FROM admin";

                    $result = mysqli_query($con, $query) or die(mysqli_error());

                    if($result==TRUE){
                        //Count no. of rows
                        $sno = 1;
                        
                        $count = mysqli_num_rows($result);
                        if($count>0){
                            while($rows = mysqli_fetch_assoc($result)){

                                //get admin data

                                $id = $rows['id'];
                                $name = $rows['name'];
                                $username = $rows['username'];
                                
                                //display in table
                                ?>
                                <tr>
                                    <td><?php echo $sno++;?></td>
                                    <td><?php echo $name;?></td>
                                    <td><?php echo $username;?></td>
                                    <td>
                                        <a href="change-password-admin.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                                        <a href="update-admin.php?id=<?php echo$id;?>" class="btn-secondary">Update Admin</a> 
                                        <a href="delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>

                            <?php
                            }
                        }
                    }
                ?>
            </table>

            <br><br><br>
            
            <h2 class='text-center'>Staff List</h2>
            <table class='tableFull'>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Position</th>
                </tr>
            <?php
                $query5 = "SELECT fname, lname, position
                FROM staff;";
                $result5 = mysqli_query($con, $query5) or die(mysqli_error());

                if($result5==TRUE){
                    //Count no. of rows                        
                    $count = mysqli_num_rows($result5);
                    if($count>0){
                        while($rows = mysqli_fetch_assoc($result5)){
                            $fname = $rows['fname'];
                            $lname = $rows['lname'];
                            $position = $rows['position'];
                            ?>


                            <tr>
                                <td><?php echo $fname?></td>
                                <td><?php echo $lname?></td>
                                <td><?php echo $position?></td>
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