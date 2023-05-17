<?php

session_start();

include_once "db.php";

  
    $cid = $_SESSION["cid"];

    $pid = $_POST["pid"];
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];


        $sql = "SELECT quantity FROM products WHERE pid=$pid AND quantity>0";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
        $sql = "INSERT INTO orders(cid,pid,name,mobile,address) VALUES($cid,$pid,'$name','$mobile','$address')";
        
        if($conn->query($sql)===TRUE)
        {

            $sql = "UPDATE products SET quantity=quantity-1 WHERE pid=$pid";
            $conn->query($sql);
            $sql = "DELETE FROM cart WHERE cid=$cid AND pid=$pid";
            $conn->query($sql);
            echo "success";
        }
        else{

            echo "error";
        }
    }
    else{

        echo "none";


    }






?>