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
  while($row = mysqli_fetch_assoc($result))  {
    echo " - id: " . $row["id"]. "<br> - Name: " . $row["name"]. "<br> - Message : " . $row["body"]. "<br> - Priority : " . $row["priority"]. "<br> - Type :" . $row["type"]."<hr>";
  }
} else {
  echo "0 results";
}
?>

<form action="delete.php" method="post">
  <h2>Want to delete an user?</h2>
  <input type="text" name="delete" placeholder="Type here to delete">
  <input type="submit" value="Delete" style="background-color: red;color:white;">
</form>
  </body>
</html>

<?php $conn->close(); ?>

