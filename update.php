<?php

$id = $_POST["id"];
$name = $_POST["name"];
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

$sql = "UPDATE `message` SET `name`='$name', `body`='$message' WHERE `id` = '$id'";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css">
</head>
<form action="select.php" method="post">
  <label for="name">
    <h3>Want to search for an user? Type the name here:</h3>
  </label>
  <input type="text" name="name">
  <input type="submit" value="Send">
</form>
<form action="update_show.php" method="post">
  <h2>Want to update an user?</h2>
  <input type="text" name="update" placeholder="Type here to update">
  <input type="submit" value="Update">
</form>
<form action="delete.php" method="post">
  <h2>Want to delete an user?</h2>
  <input type="text" name="delete" placeholder="Type here to delete">
  <input type="submit" value="Delete">
</form>
<h3>Home Page </h3>
<button><a href="form.html" style="color: blue;text-decoration:none;">Go</a></button>

</html>