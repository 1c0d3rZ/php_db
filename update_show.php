<?php

$update = $_POST["update"];

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

$sql = "SELECT id, `name`, body, priority, `type` FROM `message` HAVING `name` = '$update' ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
$row = mysqli_fetch_assoc($result);


?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="main.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css">
    <title>Update</title>
</head>

<body>
    <h1>Update</h1>

    <form action="update.php" method="post">
        <label for="text">Your id : <code>(unchangeable)</code></label>
        <input type="text" name="id" readonly value="<?php echo $row['id'];?>">
        <label for="name">Name : </label>
        <input type="text" name="name" value="<?php echo $row['name']?>">

        <label for="message">Message :</label>
        <textarea name="message"cols="20" rows="5"><?php echo $row['body']?></textarea>
        <br>
        <button>Send</button>
    </form>

    <?php } else {
  echo "0 results";
} ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="main.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css">
    <title>Update</title>
</head>
</body>

</html>