<?php
session_start();
require_once __DIR__ . '/includes/database.php'; // your $conn (mysqli)

if (isset($_POST['submit'])) {
    // Sanitize input
    $username = trim($_POST['user']);
    $password = trim($_POST['pass']);

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, username, password, role FROM user WHERE username = ? /*LIMIT 1*/");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored = $row['password'];

        // Normal (hashed) verification
        if (password_verify($password, $stored)) {
            // If algorithm changed, rehash and update
            if (password_needs_rehash($stored, PASSWORD_DEFAULT)) {
                $newHash = password_hash($password, PASSWORD_DEFAULT);
                $upd = $conn->prepare("UPDATE user SET password = ? WHERE id = ?");
                $upd->bind_param("si", $newHash, $row['id']);
                $upd->execute();
                $upd->close();
            }

            // Successful login
            session_regenerate_id(true);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['username'];
            $_SESSION['user_role'] = $row['role'];
            header("Location: author-single.php");
            exit();

            /*
            // Optional: plaintext-password migration fallback (remove after migration)
        } elseif (hash_equals($stored, $password)) {
            // Plaintext in DB, and input matches — migrate to a secure hash
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            $upd = $conn->prepare("UPDATE user SET password = ? WHERE id = ?");
            $upd->bind_param("si", $newHash, $row['id']);
            $upd->execute();
            $upd->close();

            // Successful login after migration
            session_regenerate_id(true);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['username'];
            $_SESSION['user_role'] = $row['role'];
            header("Location: author-single.php");
            exit();
            */

        } else {
            $error = "Invalid username or password.";
        }}

    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="utf-8">
  <title>Live | Exploring the World</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="This is meta description">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Hugo 0.74.3" />
  <!-- plugins -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css" media="screen">
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">
  <meta property="og:title" content="Reader | Hugo Personal Blog Template" />
  <meta property="og:description" content="This is meta description" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="" />
  <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
</head>
<body>
  <!-- navigation -->
<header class="navigation fixed-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-white">
      <a class="navbar-brand order-1" href="index.php">
        <img class="img-fluid" width="100px" src="images/logo.png"
          alt="Reader | Hugo Personal Blog Template">
      </a>
      <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
      </div>
      <div class="order-2 order-lg-3 d-flex align-items-center">
        <!-- search -->
        <form class="search-bar">
          <input id="search-query" name="s" type="search" placeholder="Search...">
        </form>
        <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
          <i class="ti-menu"></i>
        </button>
      </div>
    </nav>
  </div>
</header>
<!-- /navigation -->
<div class="header text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 mx-auto">
        <h1 class="mb-4">Login</h1>
        <ul class="list-inline">
          <li class="list-inline-item"><a class="text-default" href="index.php">Home
              &nbsp; &nbsp; /</a></li>
          <li class="list-inline-item text-primary">Login</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- SVG header shapes remain unchanged -->
</div>
<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="content mb-5">
          <h2 id="we-would-love-to-hear-from-you">Welcome back!</h2>
          <p></p>
        </div>
        <div class="form-group" id="form">
          <?php if (!empty($error)): ?>
  <div class="alert alert-danger">
    <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
  </div>
<?php endif; ?>
          <form name="form" action="login.php" method="POST">
            <label for="user">Username</label>
            <input type="text" name="user" id="user" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</section>
<footer class="footer">
  <!-- SVG footer shapes remain unchanged -->
  <div class="container">
      <div class="row align-items-center">
      <div class="col-md-5 text-center text-md-left mb-4">
          <ul class="list-inline footer-list mb-0">
            <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
            <li class="list-inline-item"><a href="terms-conditions.html">Terms Conditions</a></li>
          </ul>
      </div>
      <div class="col-md-2 text-center mb-4">
          <a href="index.html"><img class="img-fluid" width="100px" src="images/logo.png" alt="Reader | Hugo Personal Blog Template"></a>
      </div>
      <div class="col-md-5 text-md-right text-center mb-4">
          <ul class="list-inline footer-list mb-0">
          <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
          <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
          <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
          <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
          <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
          </ul>
      </div>
      <div class="col-12">
          <div class="border-bottom border-default"></div>
      </div>
      </div>
  </div>
</footer>
  <!-- JS Plugins -->
  <script src="plugins/jQuery/jquery.min.js"></script>
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <script src="plugins/slick/slick.min.js"></script>
  <script src="plugins/instafeed/instafeed.min.js"></script>
  <!-- Main Script -->
  <script src="js/script.js"></script>
</body>
</html>