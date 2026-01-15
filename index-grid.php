<?php
session_start();
//include "database.php";
require_once __DIR__ . '/includes/database.php';
?>

<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="utf-8">
  <title>Blog</title>

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
</head>
<body>
  <!-- navigation -->
<header class="navigation fixed-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-white">
      <a class="navbar-brand order-1" href="index.php">
        <img class="img-fluid" width="100px" src="images/logo.png" alt="logo">
      </a>
      <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
        <ul class="navbar-nav mx-auto">
            <a class="nav-link" href="index.php">Home</a>
            
            <li class="nav-item">
            <a class="nav-link" href="about-us.php">About Us</a>
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
        <!-- search -->
        <form class="search-bar">
          <input id="search-query" name="s" type="search" placeholder="Destination...">
        </form>
        
        <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
          <i class="ti-menu"></i>
        </button>
      </div>

   <li class="nav-item dropdown">
        <div class="login">
            <a class="btn btn-outline-primary" href="#" style="position:relative; left:1200%;" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              USER <i class="ti-angle-down ml-1"></i>
            </a>
            <div class="dropdown-menu" style="background-color:white; left:1200%;">
              
              <a class="dropdown-item" href="login.php">Login</a>

              <a class="dropdown-item" href="author-single.php">Profile</a>
              
            </div>
            </div>
          </li>


    </nav>
  </div>
</header>
<!-- /navigation -->

<br><br>

<section class="section-sm">
  <div class="container">
    <div class="row justify-content-center">
      <!-- MAIN BLOG POSTS (left) -->
      <div class="col-lg-8 mb-5 mb-lg-0">
        <h2 class="h5 section-title">Posts for Category:</h2>

        <?php
        // Fetch posts with user info
        $sql = "SELECT post.*, user.username, user.profile_image, categories.name AS category_name, categories.id AS category_id
                FROM post
                JOIN user ON post.author_id = user.id
                JOIN categories ON post.category_id = categories.id
                ORDER BY post.id DESC";

        $result = mysqli_query($conn, $sql);
        ?>

        <!-- Use a Bootstrap row + columns: each post gets col-md-4 (three per row on md+) -->
        <div class="row">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-4 mb-4">
              <article class="card h-100">
                <div class="post-slider">
                  <!-- responsive image -->
                  <img src="images/post/<?php echo htmlspecialchars($row['image']); ?>"
                       class="card-img-top"
                       alt="post-thumb"
                       style="width:100%; height:220px; object-fit:cover;">
                </div>

                <div class="card-body d-flex flex-column">
                  <h3 class="mb-2" style="font-size:1.05rem; line-height:1.2;">
                    <a href="post-details.php?post_id=<?php echo $row['id']; ?>" class="post-title">
                      <?php echo htmlspecialchars($row['title']); ?>
                    </a>
                  </h3>

                  <ul class="card-meta list-inline mb-2" style="font-size:.85rem;">
                    <li class="list-inline-item">
                      <a href="about-us.html" class="card-meta-author" style="display:inline-flex;align-items:center;">
                        <img src="images/profiles/<?php echo htmlspecialchars($row['profile_image'] ?: 'default.png'); ?>"
                             alt="author"
                             style="width:30px;height:30px;border-radius:50%;object-fit:cover;margin-right:6px;">
                        <span><?php echo htmlspecialchars($row['username']); ?></span>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <i class="ti-calendar"></i> <?php echo htmlspecialchars($row['date'] ?? ''); ?>
                    </li>
                    <li class="list-inline-item">
                      <a href="index-grid.php?categories=<?php echo urlencode($row['category_id']); ?>">
                        <?php echo htmlspecialchars($row['category_name'] ?? ''); ?>
                      </a>
                    </li>
                  </ul>

                  <p class="mb-3" style="flex:1 0 auto;"><?php echo htmlspecialchars($row['excerpt']); ?></p>

                  <div style="margin-top:auto;">
                    <a href="post-details.php?post_id=<?php echo $row['id']; ?>" class="btn btn-outline-primary btn-sm">Read More</a>
                  </div>
                </div>
              </article>
            </div>
          <?php } ?>
        </div>
      </div>

      <!-- OPTIONAL SIDEBAR (right) -->
      <div class="col-lg-4">
        <!-- You can put widgets here (search, categories, recent posts, etc.) -->
      </div>
    </div>
  </div>
</section>

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
<script src="js/script.js"></script>
</body>
</html>
