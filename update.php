<?php

$name = $_POST["name"];

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

$sql = "UPDATE `message` SET lastname='Doe' WHERE id=2";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>