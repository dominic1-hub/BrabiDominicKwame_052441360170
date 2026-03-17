<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
<div class="dashboard">
    <div class="sidebar">
        <h2>Student Portal</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#">My Courses</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Results</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="topbar">
            <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
        </div>
        <div class="cards">
            <div class="card">
                <h3>Registered Course</h3>
                <p><?php echo htmlspecialchars($user['course']); ?></p>
            </div>
            <div class="card">
                <h3>Profile Uploaded</h3>
                <p><?php echo htmlspecialchars($user['profile']); ?></p>
            </div>
            <div class="card">
                <h3>Document Uploaded</h3>
                <p><?php echo htmlspecialchars($user['document']); ?></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>


<!----<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<div class="dashboard">

    Sidebar
    <div class="sidebar">
        <h2>Student Portal</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#">My Courses</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Results</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>

     Main Content 
    <div class="main-content">

        <div class="topbar">
            <h1>Welcome, Student</h1>
        </div>

        <div class="cards">

            <div class="card">
                <h3>Registered Courses</h3>
                <p>5 Courses</p>
            </div>

            <div class="card">
                <h3>Current GPA</h3>
                <p>3.45</p>
            </div>

            <div class="card">
                <h3>Notifications</h3>
                <p>2 New</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>
--->
