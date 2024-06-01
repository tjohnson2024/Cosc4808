<?php

require_once ('database.php');

Class User {
  public function create_user($username, $password) {
      $db = db_connect();
      // Check if the username already exists
      $existing_user = $this->get_user_by_username($username);
      if ($existing_user) {
          return "Username already exists";
      }

      // Hash the password securely
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // Insert new user into the database
      $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, 
      :password)");
      $statement->execute(array(':username' => $username, ':password' => $hashed_password));
      return "User created successfully";
  }


public function login($username, $password) {
    $db = db_connect();
    // Retrieve user by username
    $user = $this->get_user_by_username($username);
    if (!$user) {
        return "User not found";
    }

    // Verify password hash
    if (password_verify($password, $user['password'])) {
        return "Login successful";
    } else {
        return "Incorrect password";
    }
}

private function get_user_by_username($username) {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users WHERE username = :username");
    $statement->execute(array(':username' => $username));
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
}



}


  