<?php include('config/cust-session.php');
//Changes to incorporate:
//1. Update inventory, decrease the item with ordered quantity
//2. If quantity is greater than inventory stock, display js popup saying that it exceeds the limit.
//2.1 If qty in inventory is 0, popup to show it is out of stock.
//Testing the changes
    $sku = $_GET['sku'];
    $size = $_GET['size'];
    $qty = $_GET['qty'];
    
    if ($size=="Large"){
        $sku=$sku.'L';

    }
    else{
        $sku=$sku.'R';
    }

    // echo $_SESSION['user'];
    // echo $sku;
    // die('lol');
    
    if(!isset($_SESSION['user'])){
        echo "<script>
            alert('Please Login/Sign Up to satisfy your cravings :)')
            window.close();
            </script>";
    }
    
    else {    
        $query="SELECT sku, item_id 
                FROM item
                WHERE sku='$sku';
                ";
        $result=mysqli_query($con, $query);
        if($result==TRUE){
            $count = mysqli_num_rows($result);
            if($count==0){
                
                // die('lol');
                echo "<script>
                    window.close();
                    </script>";
                // header('location:index.html#menu');
            }
            $row=mysqli_fetch_assoc($result);
            $item_id = $row['item_id'];
            $user= $_SESSION['user'];

            //Add inventory checks
            $query = "SELECT quantity
            FROM inventory
            WHERE item_id = '$item_id';";

            $result4 = mysqli_query($con, $query);
            if($result4==TRUE){
                if(mysqli_num_rows($result4)!=0){
                    $row = mysqli_fetch_assoc($result4);
                    $item_stock = $row['quantity'];
                    if($item_stock==0){
                        echo "<script>
                            alert('OOPS! Item is OUT-OF-STOCK. Please try later.');
                            window.close();
                            </script>";
                    }
                    else if($item_stock<$qty){
                        echo "<script>
                            alert('OOPS! Item quantity limit exceeded. Please control your appetite and SAVE YOUR SWEET TOOTH!');
                            window.close();
                            </script>";
                    }
                    else{
                        $query="SELECT cust_id, add_id
                                FROM customers
                                WHERE '$user'=email;";
                        $result2=mysqli_query($con, $query);
                        if($result2==TRUE){
                            
                            $count = mysqli_num_rows($result2);
                            if($count==0){
                                echo "<script>
                                window.close();
                                </script>";
                            }
                            $row=mysqli_fetch_assoc($result2);
                            $cust_id=$row['cust_id'];
                            $add_id=$row['add_id'];
                            
                            $query3= "INSERT INTO orders(created_at, item_id, quantity, cust_id, delivery, add_id)
                                        VALUES(NOW(), '$item_id', '$qty', '$cust_id', 0, '$add_id');";        }
                            $result3=mysqli_query($con, $query3);
                            if($result3==TRUE){
                                echo "<script>
                                        alert('You have successfully placed the order! Expect the delivery within two hours.');
                                        window.close(); 
                                        </script>";
                            }
                            else{
                                header('location:index.html');
                            }
                    }
                }
            }
        }
    }
?>
