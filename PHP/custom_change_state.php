<?php

    include_once "db.php";
    
    $cid = $_GET["cid"];
    $pid = $_GET["pid"];

    $sql = "UPDATE custom_orders SET status=1 WHERE cid=$cid AND pid=$pid";

    if($conn->query($sql)===TRUE)
    {
        header("location:../admin_panel.php");
    }

?>