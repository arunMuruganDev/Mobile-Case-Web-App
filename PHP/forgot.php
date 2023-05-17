<?php

include_once "db.php";

$email = $_POST["email"];
$cpassword = $_POST["cpassword"];

$sql = "SELECT name FROM login WHERE email='$email' ";
$result = $conn->query($sql);

if($result->num_rows>0)
{

    $sql = "UPDATE login set password='$cpassword' WHERE email='$email' ";

    if ($conn->query($sql) == TRUE) {
        echo "success";
    } 

}
else{

    echo "error";
}

?>