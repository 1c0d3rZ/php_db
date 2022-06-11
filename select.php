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

if (mysqli_connect_errno()) {
  die("Connection error: " . mysqli_connect_errno());
}

$sql = "SELECT id, `name`, body, priority, `type` FROM `message` HAVING `name` = '$name' ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {



?>


  <html>

  <head>
    <title>Resutlt Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css">
  </head>

  <body>
    <h1>Your Address</h1>
  <?php   // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    echo " - id: " . $row["id"] . "<br> - Name: " . $row["name"] . "<br> - Message : " . $row["body"] . "<br> - Priority : " . $row["priority"] . "<br> - Type :" . $row["type"] . "<hr>";
  }
} else {
  echo "0 results";
}
  ?>

  <head>
    <title>Resutlt Page</title>
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
  </body>

  </html>

  <?php $conn->close(); ?>