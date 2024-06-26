<?php

/*
   Troy Johnson
   COSC-4808
   Assignment #1
*/

session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: login.php");
    exit;
}

$currentTime = date("l, F jS Y \- g:i a");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
    <p>Today is <?php echo $currentTime; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
