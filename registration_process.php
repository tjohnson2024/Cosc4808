<?php
session_start();

// Include the User class
require_once 'user.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $new_username = isset($_POST['new_username']) ? $_POST['new_username'] : "";
    $new_password = isset($_POST['new_password']) ? $_POST['new_password'] : "";
    $retype_password = isset($_POST['retype_password']) ? $_POST['retype_password'] : "";

    // Check if passwords match
    if ($new_password !== $retype_password) {
        echo "Passwords do not match. Please try again.";
    } else {
        // Proceed with user registration
        $user = new User();
        $registration_result = $user->create_user($new_username, $new_password);
        echo $registration_result;
    }
}
?>
