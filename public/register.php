<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Store form data in session
    $_SESSION['user'] = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'course' => $_POST['course'],
        'profile' => $_FILES['profile']['name'],
        'document' => $_FILES['document']['name']
    ];

    // Save uploaded files
    if (!is_dir('uploads')) {
        mkdir('uploads');
    }
    move_uploaded_file($_FILES['profile']['tmp_name'], 'uploads/' . $_FILES['profile']['name']);
    move_uploaded_file($_FILES['document']['tmp_name'], 'uploads/' . $_FILES['document']['name']);

    // Redirect to dashboard
    header("Location: dashboard.php");
    exit;
}
?>