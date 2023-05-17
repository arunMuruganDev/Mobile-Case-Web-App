<?php 

session_start();
include_once "PHP/db.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/product.css">
    <link rel="stylesheet" href="CSS/variable.css">
    <title>Products</title>
</head>
<body>

        <nav>
            <div class="main">
                <h1>Logo</h1>
            <h2 data-text="AVAILABLE PRODUCTS">AVAILABLE PRODUCTS</h2>
            
            <!-- drop down account -->
            <div class="dropdown">
            <button class="dropbtn">ACCOUNT</button>
            <div class="dropdown-content">
            <a href="account.php">My Account</a>
            <a href="PHP/logout.php">Logout</a>
            </div>
            </div>

            </div>
            
        </nav>
        <div class="container">

            <!-- Customized Product -->
            <div class="card-container">
                <div class="image-container custom">
                    <a href="PHP/customOrder.php"><img src="Images/plus.png" alt=""></a>
                </div>

                <h1>CUSTOMIZED</h1>
                <span>₹499</span>
                <div class="cart-btn">
                    <a href="PHP/customOrder.php"><button>Buy Custom Product</button></a>
                </div>
            </div>

            <?php

            $sql = "SELECT * FROM products WHERE quantity>0";
            $result = $conn->query($sql);
            
            if ($result->num_rows >0) {
            
              while($row = $result->fetch_assoc()) {
            
              
            
            ?>
            
                        <div class="card-container">
                            <div class="image-container">
                            <?php echo "<img 
                     src='data:image;base64,{$row["img"]}'
                    alt='img'>";   ?>
                            </div>
                            <h1><?php echo strtoupper($row["pname"]);   ?></h1>
                            <span><?php echo strtoupper($row["price"]);   ?></span>
                            <div class="cart-btn">
                            <a href="PHP/cart.php?pid=<?php echo $row['pid']; ?>"><button>Add to cart</button></a>
                            </div>
                            
                        </div>
                        <?php }} ?>

           
        </div>
    
</body>
</html>