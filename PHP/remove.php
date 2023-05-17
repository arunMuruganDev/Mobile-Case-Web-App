<?php

session_start();

include_once "db.php";

  
    $pid = $_GET["pid"];
    $cid = $_SESSION["cid"];

    

       
        $sql = "DELETE FROM cart WHERE cid=$cid AND pid=$pid";

        if($conn->query($sql)===TRUE)
        {
            echo "<script>
        window.location.href='../account.php'
        </script>";
        }


?>