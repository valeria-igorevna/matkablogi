<?php
session_start();
//include "database.php";
require_once __DIR__ . '/includes/database.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Handle profile update POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bio = isset($_POST['bio']) ? trim($_POST['bio']) : '';
    $profile_image = null;

    // Handle image upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['photo']['tmp_name'];
        $fileName = basename($_FILES['photo']['name']);
        $fileSize = $_FILES['photo']['size'];
        $fileType = $_FILES['photo']['type'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxFileSize = 2 * 2024 * 1024; // 2MB

        if (in_array($fileType, $allowedTypes) && $fileSize <= $maxFileSize) {
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = 'user_' . $user_id . '_' . time() . '.' . $ext;
            $destPath = 'images/profiles/' . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $profile_image = $newFileName;
                // Update image filename in DB
                $stmt = $conn->prepare("UPDATE user SET profile_image = ? WHERE id = ?");
                $stmt->bind_param("si", $profile_image, $user_id);
                $stmt->execute();
            }
        } else {
            $error_msg = "Invalid image file. Please upload a JPG, PNG, or GIF under 2MB.";
        }
    }

    // Update bio in DB
    $stmt = $conn->prepare("UPDATE user SET bio = ? WHERE id = ?");
    $stmt->bind_param("si", $bio, $user_id);
    $stmt->execute();

    // Optional: reload user data after update
}

// Fetch user details
$stmt = $conn->prepare("SELECT id, username, role, profile_image, bio FROM user WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en-us"><head>
  <meta charset="utf-8">
  <title>Live | Exploring the World</title>

  <!-- mobile responsive meta -->
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
  <!DOCTYPE html>

<html lang="en-us"><head>
  <meta charset="utf-8">
  <title>Live | Exploring the World</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="This is meta description">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Hugo 0.74.3" />
  
  <!-- theme meta -->
  <meta name="theme-name" content="reader" />

  <!-- plugins -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="plugins/slick/slick.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css" media="screen">

  <!--Favicon-->
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <link rel="icon" href="images/logo.png" type="image/x-icon">

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
        <img class="img-fluid" width="100px" src="images/logo.png">
      </a>
      <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
        <ul class="navbar-nav mx-auto">
            <a class="nav-link" href="index.php">Home</a>
            
            <li class="nav-item">
            <a class="nav-link" href="about-us.php">About Us</a>
          </li>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Good to know <i class="ti-angle-down ml-1"></i>
            </a>
            <div class="dropdown-menu">
              
              <a class="dropdown-item" href="packing.html">Packing</a>

              <a class="dropdown-item" href="404.html">Safety</a>

              <a class="dropdown-item" href="404.html">Offers</a>
              
            </div>
          </li>



          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">Blog <i class="ti-angle-down ml-1"></i>
            </a>
            <div class="dropdown-menu">
              
              <a class="dropdown-item" href="404.html">Solo Travel</a>
              
              <a class="dropdown-item" href="404.html">Edinburg Top 5</a>
              
              <a class="dropdown-item" href="404.html">Beach Holiday</a>
              
              <a class="dropdown-item" href="404.html">For Couples</a>

              <a class="dropdown-item" href="404.html">Budget Travel</a>

              <a class="dropdown-item" href="404.html">Adventure</a>
              
              <a class="dropdown-item" href="404.html">Most Instagrammable Photo Spots in Helsinki</a>
              
              <a class="dropdown-item" href="404.html">Best Winter Destinations</a>
              
            </div>
          </li>
        </ul>
      </div>

      <div class="order-2 order-lg-3 d-flex align-items-center">
        </select>
        
        <!-- search -->
        <form class="search-bar">
          <input id="search-query" name="s" type="search" placeholder="Destination...">
        </form>
        
        <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
          <i class="ti-menu"></i>
        </button>
      </div>

  <li class="logout">
    <a class="btn btn-outline-primary" href="logout.php">Logout</a>
  </li>

    </nav>
  </div>
</header>
<!-- /navigation -->

<div class="author">
  <div class="container">
    <div class="row no-gutters justify-content-center">
      <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
        <form action="" class="form" id="form" enctype="multipart/form-data" method="post">
          <div class="author-image mb-3 text-center">
            <img style="width:190px;height:190px;border-radius:50%;object-fit:cover;"
                 src="images/profiles/<?php echo htmlspecialchars($user['profile_image'] ?: 'default.png'); ?>"
                 alt="Profile">
            <!-- Allow user to select new image -->
            <input type="file" name="photo" id="photo" accept="image/*" class="form-control mt-2">
            <?php if (!empty($error_msg)) { echo '<div class="text-danger">'.$error_msg.'</div>'; } ?>
          </div>
          <div class="form-group">
            <label for="bio"><strong>Your Bio:</strong></label>
            <textarea name="bio" id="bio" class="form-control" rows="5" maxlength="500"><?php echo htmlspecialchars($user['bio'] ?? ''); ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    
			</div>
      
			<div class="col-md-8 col-lg-6 text-center text-md-left">
        <h3 class="mb-2"><?php echo "Welcome, " . htmlspecialchars($user['username']); ?></h3>
        <strong class="mb-2 d-block"><?php echo htmlspecialchars($user['role']); ?></strong>
        <div class="content">
          <p><?php echo nl2br(htmlspecialchars($user['bio'] ?? 'Write something about yourself!')); ?></p>
        </div>
        <a class="post-count mb-1" href="post.php"><i class="ti-pencil-alt mr-2"></i> Write a new Post</a>
        <ul class="list-inline social-icons">
          <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
          <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
        </ul>
			</div>
		</div>
	</div>


	
	<svg class="author-border" height="240" viewBox="0 0 2202 240" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path
      d="M1 123.043C67.2858 167.865 259.022 257.325 549.762 188.784C764.181 125.427 967.75 112.601 1200.42 169.707C1347.76 205.869 1901.91 374.562 2201 1"
      stroke-width="2" />
  </svg>
</div>

<section class="section-sm" id="post">
	<div class="container">
		<div class="row">
			
			<div class="col-lg-8 mx-auto">
				<article class="card mb-4">
            				<?php

// Fetch posts with user info
$sql = "SELECT post.*, user.username, user.profile_image 
        FROM post 
        JOIN user ON post.author_id = user.id 
        where author_id = $user_id
        ORDER BY post.id DESC ";
        
// Fetch posts with user info
$sql_NEW = "SELECT post.*
        FROM post
        where author_id = $user_id
        ORDER BY post.id DESC ";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="col-lg-8 mx-auto">
  <article class="card mb-4">
    <img src="images/post/<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="post-thumb">
    <div class="card-body">
      <h3 class="post-title"><?php echo htmlspecialchars($row['title']); ?></h3>
      <ul class="card-meta list-inline">
        <li class="list-inline-item">
          <a href="author-single.html" class="card-meta-author">
            <img src="images/profiles/<?php echo htmlspecialchars($row['profile_image']); ?>" alt="author" style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
            <span><?php echo htmlspecialchars($row['username']); ?></span>
          </a>
        </li>
        <li class="list-inline-item">
          <i class="ti-calendar"></i> <?php echo htmlspecialchars($row['date'] ?? ''); ?>
        </li>
        <li class="list-inline-item">
          <ul class="card-meta-tag list-inline">
            <li class="list-inline-item"><?php echo htmlspecialchars($row['categories_name'] ?? ''); ?></li>
          </ul>
        </li>
      </ul>
      <p><?php echo htmlspecialchars($row['excerpt']); ?></p>
      <a href="post-details.php?post_id=<?php echo $row['id']; ?>" class="btn btn-outline-primary">Read More</a>
      <a href="updatepost.php?post_id=<?php echo $row['id']; ?>" class="btn btn-outline-primary">Update</a>
      <a href="deletepost.php?post_id=<?php echo $row['id']; ?>" class="btn btn-outline-primary">Delete</a>
    </div>
  </article>
</div>
<?php
}
?>

		

<footer class="footer">
  <svg class="footer-border" height="214" viewBox="0 0 2204 214" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M2203 213C2136.58 157.994 1942.77 -33.1996 1633.1 53.0486C1414.13 114.038 1200.92 188.208 967.765 118.127C820.12 73.7483 263.977 -143.754 0.999958 158.899"
      stroke-width="2" />
  </svg>

  
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
  <script src="js/script.js"></script></body>
</html>