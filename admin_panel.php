<?php

session_start();

include_once "PHP/db.php";

$pname = "";
$price = "";
$quantity = "";

if(isset($_SESSION["adminName"]))
{


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/admin_panel.css">
    <link rel="stylesheet" href="CSS/variable.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Admin</title>
</head>
<body>



        <div class="head">
           
            <h1>ADMIN DASHBOARD</h1>
        </div>

   
        <div class="main">
        <div class="sidenav">

            <ul>
                <li onclick="first()">Add Product</li>
                <li onclick="second()">Orders</li>
                <li onclick="fourth()">Customized Orders</li>
                <li onclick="third()">Delivered Items</li>
                
            </ul>
            <div class="logout">
                <a href="PHP/admin_logout.php">LOGOUT</a>
            </div>
            
        </div>

        <!-- First -->

        <?php

if(isset($_POST["submit"]))
{

   

        $pname = $_POST["product_name"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        
        $image=$_FILES['image']['tmp_name'];
        //$name=$_FILES['image']['name'];

        if(!$pname)
        {
            echo "<script>swal('OOPS!','Enter product name','error')</script>";
        }
        else if(!$price)
        {
            echo "<script>swal('OOPS!','Enter product price','error')</script>";
        }
        else if(!$quantity)
        {
            echo "<script>swal('OOPS!','Enter quantity','error')</script>";
        }
        else if(!$image)
        {
            echo "<script>swal('OOPS!','Select an image','error')</script>";
        }
        else{

        $image=file_get_contents($image);
        $image=base64_encode($image);

        

      
        //$sql="INSERT INTO img (NAME,IMAGE) VALUES('$name','$image')";
        $sql="INSERT INTO products(pname,price,quantity,img) VALUES('$pname',$price,$quantity,'$image') ";

        if($conn->query($sql)){

            echo "<script>swal('Success!','Product Added Successfully','Success')</script>";
        }
        else{
            echo "<script>alert('Data not stored');</script>";
        }
    
    }


   
    }


?>


        <div class="first">
            <h2>Add Item</h2>
            <form action="" method="POST"  enctype="multipart/form-data" autocomplete="off">
                
        
             <input type="text"  name="product_name" value="<?php echo $pname; ?>" placeholder="Product Name">
             <input type="text"  name="price" value="<?php echo $price; ?>" placeholder="Price">
             <input type="number"  name="quantity" value="<?php echo $quantity; ?>" placeholder="Quantity">
             <input type="file" name="image" accept="image/*">
             <input type="submit" name="submit"  value="Add">   
            </form>
           
        </div>

        

        <!-- Second -->
        <div class="second">
            <h2>New Orders</h2>
            <div class="main">
            
            <table>
                <thead>
                    <tr>
                    <th>S.No</th>  
                        <th>Product</th>
                        <th>Price</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Address Details</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                $sql = "SELECT * FROM products INNER JOIN orders ON products.pid = orders.pid WHERE status=0";
                $result = $conn->query($sql);

                if ($result->num_rows >0) {
                $i=1;
                while($row = $result->fetch_assoc()) {

                    
                                            

                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo "<img 
                        src='data:image;base64,{$row["img"]}'
                        alt='img'><br>"; echo $row["pname"]?></td>
                        <td><?php echo $row['price']  ?></td>
                        <td><?php echo $row['name']  ?></td>
                        <td><?php echo $row["mobile"]; ?></td>
                        <td><?php echo $row["address"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td><a href="PHP/change_state.php?cid=<?php echo $row['cid'] ?>&&pid=<?php echo $row['pid']; ?>"><button>Change</button></a></td>
                       
                    </tr>
                    <?php $i++;}}?>
                </tbody>
            </table>
        </div>

        </div>

        <!-- Third -->
        <div class="third">
            <h2>Delivered Orders</h2>
            <div class="main">
                
                <table>
                    <thead>
                    <tr>
                    <th>S.No</th>  
                        <th>Product</th>
                        <th>Price</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Address Details</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                        $sql = "SELECT * FROM products INNER JOIN orders ON products.pid = orders.pid WHERE status=1";
                        $result = $conn->query($sql);

                        if ($result->num_rows >0) {
                        $i=1;
                        while($row = $result->fetch_assoc()) {

                            
                                                    

                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo "<img 
                                src='data:image;base64,{$row["img"]}'
                                alt='img'><br>"; echo $row["pname"]?></td>
                                <td><?php echo $row['price']  ?></td>
                                <td><?php echo $row['name']  ?></td>
                                <td><?php echo $row["mobile"]; ?></td>
                                <td><?php echo $row["address"]; ?></td>
                                <td><?php echo $row["date"]; ?></td>
                            
                            </tr>
                            <?php $i++;}}?>
                    </tbody>
                </table>
            </div>
    

        </div>

        <!-- Fourth -->
        <div class="fourth">

            <h2>New Custom Orders</h2>
            <div class="main">
            
            <table>
            <tr>
                    <th>S.No</th>  
                        <th>Brand</th>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Address Details</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                $sql = "SELECT * FROM custom_orders WHERE status=0";
                $result = $conn->query($sql);

                if ($result->num_rows >0) {
                $i=1;
                while($row = $result->fetch_assoc()) {

                    
                                            

                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["bname"]  ?></td>
                        <td><?php echo "<img 
                        src='data:image;base64,{$row["img"]}'
                        alt='img'><br>"; echo $row["pname"]?></td>
                        <td><?php echo $row['name']  ?></td>
                        <td><?php echo $row["mobile"]; ?></td>
                        <td><?php echo $row["address"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td><a href="PHP/custom_change_state.php?cid=<?php echo $row['cid'] ?>&&pid=<?php echo $row['pid']; ?>"><button>Change</button></a></td>
                       
                    </tr>
                    <?php $i++;}}?>
                </tbody>
            </table>
        </div>

        </div>

   </div>
         <script src="Script/admin_panel.js"></script>   

</body>
</html>

<?php

}
else
{
    header("location:admin_login.html");
}

?>