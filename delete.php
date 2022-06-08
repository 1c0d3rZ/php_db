<?php 

$delete = $_POST["delete"];

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

// sql to delete a record
$sql = "DELETE FROM `message` WHERE `name`= '$delete'";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>