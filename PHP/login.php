<?php

session_start();

include_once "db.php";

$name = $_POST["name"];
$password = $_POST["password"];

$sql = "SELECT * FROM login WHERE name='$name' AND password='$password' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    $_SESSION['cid']=$row['cid'];
	  $_SESSION['name']=$name;
    echo "success";
  
} else {
  echo "error";
}

?>