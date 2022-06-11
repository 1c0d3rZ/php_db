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

?>
  <html>

  <head>
    <title>Delete Status</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css">
  </head>

  <body>
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
  <?php
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn); ?>
  </body>

  </html>