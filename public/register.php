<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Define allowed extensions
    $allowed_profile = ['jpg', 'jpeg', 'png'];
    $allowed_doc = ['pdf', 'doc', 'docx'];

    // 2. Get file info
    $profile_ext = strtolower(pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION));
    $doc_ext = strtolower(pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION));

    // 3. Validate Profile (JPG/PNG)
    if (!in_array($profile_ext, $allowed_profile)) {
        echo "<script>alert('Error: Profile picture must be a JPG or PNG file.')</script>";
        exit();
    }

    // 4. Validate Document (PDF/DOC)
    if (!in_array($doc_ext, $allowed_doc)) {
        echo "<script>alert('Error: Document must be a PDF or DOC file.')</script>";
        exit();
    }

    // Store form data in session
    $_SESSION['user'] = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'course' => $_POST['course'],
        'profile' => $_FILES['profile']['name'],
        'document' => $_FILES['document']['name']
    ];

    // Fixed the missing bracket from your original code
    if (strlen($_POST['password']) < 6) {
        echo "Password must be at least 6 characters.";
        exit();
    }

    // Save uploaded files
    if (!is_dir('uploads')) {
        mkdir('uploads');
    }
    
    // Move files to the designated folder
    move_uploaded_file($_FILES['profile']['tmp_name'], 'uploads/' . $_FILES['profile']['name']);
    move_uploaded_file($_FILES['document']['tmp_name'], 'uploads/' . $_FILES['document']['name']);

    header("Location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Page</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <div class="contact-information">
    <div class="big-data">
      <div class="featured-contactwrap">
        <div class="featured-credentials">
          <div class="contact-txt">
            <h1>WELCOME TO ELMWOOD UNIVERSITY COURSE REGISTRATION PORTAL</h1>
          </div>
        </div>
        <div id="form" class="featured-contact_form">
          <h2 class="text-section u-blue">Fill the form to register</h2>
          <div class="form">
            <form class="form-container" action="register.php" method="post" enctype="multipart/form-data" >
              <div class="form-row">
                <div class="form-column">
                  <div class="form-label">Full name: *</div>
                  <input class="form-textField" type="text" name="name" placeholder="Name*" required>
                </div>
              </div>  
              <div class="form-row">
                <div class="form-column">
                  <div class="form-label">Email Address: *</div>
                  <input class="form-textField" type="text" name="email" placeholder="Email*" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-column">
                  <div class="form-label">Password *</div>
                  <input class="form-textField" type="password" name="password" placeholder="Password*" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-column">
                  <div class="form-label">Select Course *</div>
                  <select name="course" >
                    <option value=""></option>
                      <option value="Btech Computer Technology">Btech Computer Technology</option>
                      <option value="Artificial Intelligence">Artificial Intelligence</option>
                      <option value="Machine Learning">Machine Learning</option>
                      <option value="Data Science">Data Science</option>
                      <option value="Statistics & Probability">Statistics & Probability</option>
                    </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-column">
                  <div class="form-label">Profile *</div>
                  <input class="files-upload" type="file" name="profile" required><br><br>
                  <div class="form-label">Document *</div>
                  <input class="files-upload" type="file" name="document" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-column">
                  <input class="u-button scaleX" type="submit" data-wait="Please wait..."  value="Submit Form" >
                  <p class="login">Already have an account?
                      <a href="index.php">Login</a>
                  </p>
                </div>
              </div>  
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>



