

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_SESSION['user'])) {

        $user = $_SESSION['user'];
        
        if ($_POST['email'] === $user['email'] && password_verify($_POST['password'], $user['password'])) {
            
            $_SESSION['logged_in'] = true;
                
            header("Location: dashboard.php");
             exit;
        
        } else {
             $error = "Invalid email or password!";
        }
    
    }else{
        echo "<script>alert('No registered user. Please register first!')</script>";
    }
}


/*session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $mock_email = "test@example.com";
    $mock_password_hash = password_hash("password123", PASSWORD_DEFAULT);

    $input_email = $_POST['email'];
    $input_password = $_POST['password']

    if ( $input_email === mock_email && password_verify($input_password, $mock_password_hash)) {

        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = ['email' => $input_email, 'name' => 'Test User'];

        header("Location: dashboard.php");
        exit();
    } else{
        $error = "Invalid email or password!";
    }
}
*/
?>

