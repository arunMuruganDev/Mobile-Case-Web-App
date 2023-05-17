<?php

session_start();

include_once "db.php";

$name = "";

if(isset($_SESSION["name"]))
{
  
    $pid = $_GET["pid"];
    $cid = $_SESSION["cid"];

    $sql = "SELECT * FROM cart WHERE cid=$cid AND pid=$pid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
       

        echo "<script>alert('Product already added to the cart')
        window.location.href='../product.php'
        </script>";
        
        
    }
    else
    {

    // echo $pid." ",$cid;

    $sql = "INSERT INTO cart value($cid,$pid)";


    if($conn->query($sql)===TRUE)
    {
        echo "<script>alert('Product added to the cart')
        window.location.href='../product.php'
        </script>";
    }
    else{

        echo "<script>alert('Product not added to the cart')
        window.location.href='../product.php'
        </script>";
    }

}


}


else{

    header("location:../login.html");
}

?>
