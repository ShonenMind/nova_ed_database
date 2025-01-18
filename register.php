<?php
// register.php
session_start();
require 'firebase_init.php'; // This loads the $firebase database object

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Grab the data from the form
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into Firebase Realtime Database
    // Option A: Key them by auto-generated push ID:
    // $database->getReference('users')->push([
    //     'username' => $username,
    //     'email'    => $email,
    //     'password' => $hashedPassword
    // ]);

    // Option B: Key them by username or email (if unique):
    $emailKey = str_replace(['@','.', '+'], '_', $email);
    $database->getReference('users/' . $emailKey)->set([
        'username' => $username,
        'password' => $hashedPassword
    ]);
        

    // You might set a session or redirect to a success page
    $_SESSION['username'] = $username;
    header('Location: welcome.php'); // example
    exit;
} else {
    // If someone tries to access register.php directly (GET request)
    echo "Invalid request method.";
}
