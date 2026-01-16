<?php 
session_start();
//include "database.php";
require_once __DIR__ . '/includes/database.php';
?>

<!DOCTYPE html>

<html lang="en-us"><head>
  <meta charset="utf-8">
  <title>Cynefin</title>

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
  <link rel="shortcut icon" href="images/logo2.png" type="image/x-icon">
  <link rel="icon" href="images/logo2.png" type="image/x-icon">

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
        <img class="img-fluid" width="150px" src="images/logo2.png">
      </a>
      <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
        <ul class="navbar-nav mx-auto">
            <a class="nav-link" href="index.php" style="font-weight:bold;">Home</a>
            
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

            <!-- login -->
     <!-- <div class="login">
        <a href="login.php" class="btn btn-outline-primary">Login</a>
      </div>-->


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

  <!-- start of banner-->
  <div class="banner text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h1 class="mb-5 hero-title">Little by Little, One Travels Far</h1>
        </div>
      </div>
      <svg class="banner-border" height="240" viewBox="0 0 2202 240" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 123.043C67.2858 167.865 259.022 257.325 549.762 188.784C764.181 125.427 967.75 112.601 1200.42 169.707C1347.76 205.869 1901.91 374.562 2201 1" stroke-width="2" />
      </svg>
    </div>
  </div>
  <!-- end of banner -->

  <section class="section pb-0" style="margin-top: 100px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 mb-5">
        <h2 class="h5 section-title">Editors Pick</h2>
        <article class="card">
          <div class="post-slider slider-sm">
            <img src="images/post/helsinki.jpg" class="card-img-top" alt="post-thumb">
          </div>
          
          <div class="card-body">
            <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">HELSINKI: Explore the capital of Finland</a></h3>
            <ul class="card-meta list-inline">
              <li class="list-inline-item">
                <i class="ti-timer"></i>2 Min To Read
              </li>
              <li class="list-inline-item">
                <i class="ti-calendar"></i>23.06.2025
              </li>
              <li class="list-inline-item">
                <ul class="card-meta-tag list-inline">
                  <li class="list-inline-item"><a href="tags.html">Finland</a></li>
                  <li class="list-inline-item"><a href="tags.html">City</a></li>
                  <li class="list-inline-item"><a href="tags.html">Nordic</a></li>
                </ul>
              </li>
            </ul>
            <p>It’s no secret that the digital industry is booming. From exciting startups to …</p>
            <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
          </div>
        </article>
      </div>
      <div class="col-lg-4 mb-5">
        <h2 class="h5 section-title">Beach Holiday</h2>
        
        <article class="card mb-4">
          <div class="card-body d-flex">
            <img class="card-img-sm" src="images/a10.jpg">
            <div class="ml-3">
              <h4><a href="post-details.html" class="post-title">Greece</a></h4>
              <ul class="card-meta list-inline mb-0">
                <li class="list-inline-item mb-0">
                  <i class="ti-calendar"></i>14 jan, 2020
                </li>
                <li class="list-inline-item mb-0">
                  <i class="ti-timer"></i>2 Min To Read
                </li>
              </ul>
            </div>
          </div>
        </article>
        
        <article class="card mb-4">
          <div class="card-body d-flex">
            <img class="card-img-sm" src="images/a10.jpg">
            <div class="ml-3">
              <h4><a href="post-details.html" class="post-title">Greece</a></h4>
              <ul class="card-meta list-inline mb-0">
                <li class="list-inline-item mb-0">
                  <i class="ti-calendar"></i>14 jan, 2020
                </li>
                <li class="list-inline-item mb-0">
                  <i class="ti-timer"></i>2 Min To Read
                </li>
              </ul>
            </div>
          </div>
        </article>
        
        <article class="card mb-4">
          <div class="card-body d-flex">
            <img class="card-img-sm" src="images/k2.jpg">
            <div class="ml-3">
              <h4><a href="post-details.html" class="post-title">Bali</a></h4>
              <ul class="card-meta list-inline mb-0">
                <li class="list-inline-item mb-0">
                  <i class="ti-calendar"></i>14 jan, 2020
                </li>
                <li class="list-inline-item mb-0">
                  <i class="ti-timer"></i>2 Min To Read
                </li>
              </ul>
            </div>
          </div>
        </article>
      </div>
      
      <div class="col-lg-4 mb-5">
        <h2 class="h5 section-title">City Holiday</h2>
        
        <article class="card">
          <div class="post-slider slider-sm">
            <img src="images/post/city.jpg" class="card-img-top" alt="post-thumb">
          </div>
          <div class="card-body">
            <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">How To Not Fall Prey To Pickpocketing</a></h3>
            <ul class="card-meta list-inline">
              <li class="list-inline-item">
                <i class="ti-timer"></i>2 Min To Read
              </li>
              <li class="list-inline-item">
                <i class="ti-calendar"></i>14 jan, 2020
              </li>
              <li class="list-inline-item">
                <ul class="card-meta-tag list-inline">
                  <li class="list-inline-item"><a href="tags.html">City</a></li>
                  <li class="list-inline-item"><a href="tags.html">Food</a></li>
                  <li class="list-inline-item"><a href="tags.html">Taste</a></li>
                </ul>
              </li>
            </ul>
            <p>It’s no secret that the digital industry is booming. From exciting startups to …</p>
            <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
          </div>
        </article>
      </div>
      <div class="col-12">
        <div class="border-bottom border-default"></div>
      </div>
    </div>
  </div>
</section>

  <!-- MAIN BLOG ARTICLES + SIDEBAR -->
  <section class="section-sm">
    <div class="container">
      <div class="row justify-content-center">
        <!-- MAIN BLOG POSTS -->
        <div class="col-lg-8 mb-5 mb-lg-0">
          <h2 class="h5 section-title">Start Exploring</h2>
<?php

// Fetch posts with user info
$sql = "SELECT post.*, user.username, user.profile_image, categories.name AS category_name, categories.id AS category_id
        FROM post
        JOIN user ON post.author_id = user.id
        JOIN categories ON post.category_id = categories.id
        ORDER BY post.id DESC LIMIT 3";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
?>
            <article class="card mb-4">
              <div class="post-slider">
              <img src="images/post/<?php echo htmlspecialchars($row['image']); ?>"
     class="card-img-top" alt="post-thumb" style="width:400px; height:600px; object-fit:cover;">
              </div>
              <div class="card-body">
                <h3 class="mb-3">
                  <a href="post-details.php?post_id=<?php echo $row['id']; ?>" class="post-title">
                    <?php echo htmlspecialchars($row['title']); ?>
                  </a>
                </h3>
                 <!-- Optionally insert author or date here -->
      <ul class="card-meta list-inline">
        <li class="list-inline-item">
          <a href="about-us.php" class="card-meta-author">
            <img src="images/profiles/<?php echo htmlspecialchars($row['profile_image'] ?: 'default.png'); ?>" alt="author" style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
            <span><?php echo htmlspecialchars($row['username']); ?></span>
          </a>
        </li>
        <li class="list-inline-item">
          <i class="ti-calendar"></i> <?php echo htmlspecialchars($row['date'] ?? ''); ?>
        </li>
        <li class="list-inline-item">
  <ul class="card-meta-tag list-inline">
    <li class="list-inline-item">
      <a href="index-grid.php?categories=<?php echo urlencode($row['category_id']); ?>">
        <?php echo htmlspecialchars($row['categories_name'] ?? ''); ?>
      </a>
    </li>
    <!-- If you have more categories, loop here -->
  </ul>
</li>
      </ul>
                <p><?php echo htmlspecialchars($row['excerpt']); ?></p>
                <a href="post-details.php?post_id=<?php echo $row['id']; ?>" class="btn btn-outline-primary">Read More</a>
              </div>
            </article>
          <?php
          }
          ?>
                  <a href="index-grid.php?>" class="btn btn-outline-primary" style="left:600px">More Posts</a>
        </div>
        <!-- SIDEBAR -->
        <aside class="col-lg-4 sidebar-home">
          <!-- about me -->
          <div class="widget widget-about">
            <h4 class="widget-title">Hi, Nice to meet You!</h4>
            <img class="img-fluid" src="images/a6.jpg" alt="Themefisher">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel in in donec iaculis tempus odio nunc laoreet . Libero ullamcorper.</p>
            <ul class="list-inline social-icons mb-3">
              <li class="list-inline-item"><a href="https://www.instagram.com/valeriaa.igorevna/"><i class="ti-instagram"></i></a></li>
              <li class="list-inline-item"><a href="https://www.linkedin.com/in/valeria-aladko/"><i class="ti-linkedin"></i></a></li>
              <li class="list-inline-item"><a href="https://github.com/valeria-igorevna"><i class="ti-github"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
            </ul>
            <a href="about-us.php" class="btn btn-primary mb-2">About Us</a>
          </div>
          <!-- Promotion -->
          <div class="promotion">
            <img src="images/a7.jpg" class="img-fluid w-100">
            <div class="promotion-content">
              <h5 class="text-white mb-3">Sponsor Sponsor!!</h5>
              <p class="text-white mb-4">Lorem ipsum dolor sit amet, consectetur sociis. Etiam nunc amet id dignissim. Feugiat id tempor vel sit ornare turpis posuere.</p>
              <a href="https://themefisher.com/" class="btn btn-primary">Visit</a>
            </div>
          </div>
          <!-- categories -->
          <div class="widget widget-categories">
            <h4 class="widget-title"><span>Categories</span></h4>
            <ul class="list-unstyled widget-list">
              <li><a href="index-grid.php" class="d-flex">Beach <small class="ml-auto">(4)</small></a></li>
              <li><a href="index-grid.php" class="d-flex">City <small class="ml-auto">(1)</small></a></li>
              <li><a href="index-grid.php" class="d-flex">Hiking <small class="ml-auto">(1)</small></a></li>
              <li><a href="index-grid.php" class="d-flex">Food <small class="ml-auto">(1)</small></a></li>
              <li><a href="index-grid.php" class="d-flex">Couples <small class="ml-auto">(1)</small></a></li>
              <li><a href="index-grid.php" class="d-flex">Families <small class="ml-auto">(3)</small></a></li>
              <li><a href="index-grid.php" class="d-flex">Newyork city <small class="ml-auto">(1)</small></a></li>
              <li><a href="index-grid.php" class="d-flex">Paradise <small class="ml-auto">(1)</small></a></li>
              <li><a href="index-grid.php" class="d-flex">Scotland <small class="ml-auto">(2)</small></a></li>
              <li><a href="index-grid.php" class="d-flex">Helsinki <small class="ml-auto">(1)</small></a></li>
              <li><a href="index-grid.php" class="d-flex">London <small class="ml-auto">(1)</small></a></li>
              <li><a href="index-grid.php" class="d-flex">Packing Guide <small class="ml-auto">(1)</small></a></li>
            </ul>
          </div>

          <!-- Social -->
          <div class="widget">
            <h4 class="widget-title"><span>Social Links</span></h4>
            <ul class="list-inline widget-social">
              <li class="list-inline-item"><a href="#"><i class="ti-instagram"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-5 text-center text-md-left mb-4">
          <ul class="list-inline footer-list mb-0">
            <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
            <li class="list-inline-item"><a href="terms-conditions.html">Terms Conditions</a></li>
          </ul>
        </div>
        <div class="col-md-2 text-center mb-4">
          <a href="index.php"><img class="img-fluid" width="150px" src="images/logo2.png" alt="Cynefin | Travel Blog official logo"></a>
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
  <script src="js/script.js"></script>
</body>
</html>