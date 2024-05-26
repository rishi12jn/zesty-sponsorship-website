<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Check if user exists in the CSV file
  $users = file("users.csv", FILE_IGNORE_NEW_LINES);
  foreach ($users as $user) {
    list($username, $user_email, $user_password) = explode(",", $user);
    if ($user_email == $email && $user_password == $password) {
      // User found, redirect to homepage or dashboard
      header("Location: homepage.html");
      exit;
    }
  }

  // If user not found, redirect back to login page
  header("Location: login.html");
  exit;
}
?>
