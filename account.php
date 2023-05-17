<?php

session_start();

include_once "PHP/db.php";

$cid = $_SESSION["cid"];

if(isset($_SESSION["name"]))
{

    $name=$_SESSION["name"];

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
    <title>My Account</title>
</head>
<body>



        <div class="head">
           
            <h1>WELCOME <?php echo $name;  ?></h1>
        </div>

   
        <div class="main">
        <div class="sidenav">

            <ul>
                <li onclick="first()">Cart</li>
                <li onclick="second()">Orders</li>
                <li onclick="third()">Delivered Items</li>
                
            </ul>
            <div class="logout">
                <a href="PHP/logout.php">LOGOUT</a>
            </div>
            
        </div>

        <!-- First -->



        <div class="first firstCart">
            <h2>Cart</h2>

            <?php

$sql = "SELECT * FROM cart INNER JOIN products ON cart.pid = products.pid WHERE cid = $cid";
$result = $conn->query($sql);

if ($result->num_rows >0) {

  while($row = $result->fetch_assoc()) {

  

?>
            <div class="cart">

            <?php echo "<img 
         src='data:image;base64,{$row["img"]}'
        alt='img'>";   ?>

        <h3><?php echo $row['pname'] ?></h3>
        <h3><?php echo "₹ ".$row['price']?></h3>
        <a href="PHP/order.php?pid=<?php echo $row['pid']; ?>"><button>BUY NOW</button></a>
        <a href="PHP/remove.php?pid=<?php echo $row['pid']; ?>"><button id="remove">REMOVE</button></a>
                
            </div>

            <?php
  }}

            ?>
           
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
                       
                    </tr>
                </thead>
                <tbody>

                <?php

                $sql = "SELECT * FROM products INNER JOIN orders ON products.pid = orders.pid WHERE cid = $cid";
                $result = $conn->query($sql);

                if ($result->num_rows >0) {
                $i=1;
                while($row = $result->fetch_assoc()) {

                    if($row['status']==0)
                    {
                                            

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
                    <?php }$i++;}}?>
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

                        $sql = "SELECT * FROM products INNER JOIN orders ON products.pid = orders.pid WHERE cid = $cid";
                        $result = $conn->query($sql);

                        if ($result->num_rows >0) {
                        $i=1;
                        while($row = $result->fetch_assoc()) {

                            if($row['status']==1)
                            {
                                                    

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
                    <?php }$i++;}}?>
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
    header("location:login.html");
}

?>