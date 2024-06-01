<?php
session_start();

// Include the User class
require_once 'user.php';

// Handle user login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    $user = new User();
    $login_result = $user->login($username, $password);
    echo $login_result;
}
?>
