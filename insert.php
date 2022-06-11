<?php

$name = $_POST["name"];
$message = $_POST["message"];
$priority = filter_input(INPUT_POST, 'priority', FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, 'type', FILTER_VALIDATE_INT);
$terms = filter_input(INPUT_POST, 'terms', FILTER_VALIDATE_BOOLEAN);

if (!$terms) {
    die("Terms must be accepted");
}

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

$sql = "INSERT INTO message (name, body, priority, type) VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssii", $name, $message, $priority, $type);

mysqli_stmt_execute($stmt);

?>

<html>

<head>
    <title>Record Status</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css">
</head>

<body>
    <h1>Record Status</h1>
    <p>
        <?php echo "Record Saved!"; ?>
    </p>
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
</body>

</html>