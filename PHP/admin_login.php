<?php

session_start();

include_once "db.php";

$name = $_POST["name"];
$password = $_POST["password"];

$sql = "SELECT name FROM admin WHERE name='$name' AND password='$password' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    
	  $_SESSION['adminName']=$name;
    echo "success";
  
} else {
  echo "error";
}

?>