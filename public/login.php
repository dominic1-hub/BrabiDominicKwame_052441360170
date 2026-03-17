<?php
session_start(); // 1. Must be the very first line to access $_SESSION
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 2. Access the 'user' array created in register.php
    if (isset($_SESSION['user'])) {
        
        // 3. Compare input with the stored session data
        if ($email === $_SESSION['user']['email'] && 
            password_verify($password, $_SESSION['user']['password'])) {
            
            $_SESSION['logged_in'] = true;
            header("Location: dashboard.php");
            exit();
            
        } else {
            echo "<script>alert('Invalid email or password!'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('No registered user found. Please register first!'); window.location.href='register.php';</script>";
    }
}
?>
