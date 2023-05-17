<?php

session_start();

include_once "PHP/db.php";

$name = "";

if(isset($_SESSION["name"]))
{
    $name = $_SESSION["name"];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Case App</title>
    <link rel="stylesheet" href="CSS/variable.css">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

    <header>
        <div class="container">
            <a href="#">LOGO</a>

            <nav>
                <a href="index.php">HOME</a>
                <a href="product.php">PRODUCTS</a>
                <?php 

                    if($name)
                    {
                                        
                ?>
            
            
            <a href="account.php">MY ACCOUNT</a>
            <a href="PHP/logout.php">LOGOUT</a>


                <?php 

                    }
                    else{

                ?>
                <a href="admin_panel.php">ADMIN</a>
                <?php 
                    }?>
            </nav>


        </div>
    </header>

    <main>

        <section class="banner-container">
            <div class="container">
                <div class="left-section">

                    <h1>Welcome to Mobile Case Store</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam ipsa laborum 
                        ipsam harum amet iusto repellat deserunt ducimus. Labore similique maiores 
                        rem voluptas inventore harum! Ex mollitia minus tempora hic.</p>
                    <?php
                    if($name){
                    ?>
                    <button><a href="product.php">VIEW Products</a></button>
                    <?php
                    }else{
                    ?>
                    <button><a href="login.html">LOGIN</a></button>
                    <?php
                    }
                    ?>
                </div>
                <?php
                    if(!$name){
                    ?>
                    
                   
                <div class="right-section">

                    <h4>SIGN UP form</h4>
                    <form action="" method="POST">
                        <div class="input-group">
                            <input type="text" id="name" required>
                            <label for="name">Name</label>
                        </div>
                        <div class="input-group">
                            <input type="email" id="email" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-group">
                            <input type="password" id="password" required>
                            <label for="password">Password</label>
                        </div>

                        <div class="submit-section">
                            <input type="submit" id="btn" class="submit-button" value="Register"/>
                        </div>

                    </form>

                </div>
                <?php
                    }
                    ?>
            </div>
        </section>

        <section class="section-two">

        <?php

$sql = "SELECT * FROM products WHERE quantity>0 AND quantity<10 ";
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
                    <button><a href="PHP/cart.php?pid=<?php echo $row['pid']; ?>">Add to cart</a></button>
                </div>
                
            </div>
            <?php }} ?>
            
        
                
            </div>
        </section>

    </main>
    <footer>
        Designed and developed by <span>Arun Murugan</span>
    </footer>

    <script src="Script/script.js"></script>
    
</body>
</html>