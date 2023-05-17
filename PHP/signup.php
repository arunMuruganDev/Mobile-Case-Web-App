<?php

include_once "db.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "INSERT INTO login(name,email,password)
VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "success";
} else {
  echo "error";
}

?>