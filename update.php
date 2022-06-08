<?php

$name = $_POST[$name];
$nameup = $_POST["name"];
$message = $_POST["message"];

$host = "127.0.0.1";
$db_name = "message_db";
$user = "root";
$pass = "";

$conn = mysqli_connect(
    $host,
    $user,
    $pass,
    $db_name
);

$sql = "UPDATE `message` SET `name`='$nameup', `message`='$message' WHERE `name` = '$name'";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>