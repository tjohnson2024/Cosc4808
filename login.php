<?php
/*
Troy Johnson
219-632-800
Assignment 01
*/


session_start();

$valid_credentials = array(
    "Troy" => "Johnson20#1"
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    if (isset($valid_credentials[$username]) && $valid_credentials[$username] === $password) {
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username; // Set the username in the session
        header("Location: index.php");
        exit;
    } else {
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 1;
        } else {
            $_SESSION['login_attempts']++;
        }
        echo "Invalid username or password. Please try again.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
    <?php
    if (isset($_SESSION['login_attempts'])) {
        echo "<p>Failed login attempts: ".$_SESSION['login_attempts']."</p>";
    }
    ?>
</body>
</html>
