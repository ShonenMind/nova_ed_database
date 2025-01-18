<?php
// login.php
session_start();
require 'firebase_init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // If you keyed by username, you'd do something like:
    // $userSnapshot = $database->getReference('users/'.$username)->getValue();
    // But since we only have email from the form, you might store by email or push ID.
    // For example, if you stored by username, you'd also want to ask for "username" on login.
    // For simplicity, let's assume you stored by email:

    $emailKey = str_replace(['@','.', '+'], '_', $email);
    $userRef = $database->getReference('users/' . $emailKey);
    $userData = $userRef->getValue();
    // ...


    if ($userData) {
        // We have user data in Firebase; verify the password
        if (password_verify($password, $userData['password'])) {
            // Password correct
            $_SESSION['email'] = $email;
            header('Location: index.html');
            echo 'Logged in';
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid request method.";
}
