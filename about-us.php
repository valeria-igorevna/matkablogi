<?php
session_start();
//include "database.php";
require_once __DIR__ . '/includes/database.php';

// Fetch all users
$stmt = $conn->prepare("SELECT id, username, role, profile_image, bio FROM user");
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>

<html lang="en-us"><head>
  <meta charset="utf-8">
  <title>Cynefin | Exploring the World</title>

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
            <a class="nav-link" href="about-us.html">About Us</a>
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
<div class="header text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 mx-auto">
        <h1 class="mb-4">Meet the writers!</h1>
        <ul class="list-inline">
          <li class="list-inline-item"><a class="text-default" href="index.php">Home
              &nbsp; &nbsp; /</a></li>
          <li class="list-inline-item text-primary">About Us</li>
        </ul>
      </div>
    </div>
  </div>
</div>

  <section class="section-sm">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
          <div class="image-wrapper">
            <img class="img-fluid w-100" 
              src="images/profiles/<?php echo htmlspecialchars($users[0]['profile_image'] ?? 'default.png'); ?>" 
              alt="<?php echo htmlspecialchars($users[0]['username'] ?? ''); ?>">
          </div>
        </div>
        <div class="col-lg-5 col-md-6">
          <div class="content pl-lg-3 pl-0">
            <h2>Hello, I'm <?php echo htmlspecialchars($users[0]['username'] ?? ''); ?>!</h2>
            <p><?php echo htmlspecialchars($users[0]['bio'] ?? 'This writer hasn’t shared a bio yet.'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>



<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mb-5">
        <h2>My Posts</h2>
      </div>

      <?php if (!empty($user_post)): ?>
        <?php foreach ($user_post as $post): ?>
          <div class="col-lg-3 col-sm-6 text-center mb-4">
            <div class="card border-0 shadow-sm h-100">
              <img 
                src="images/posts/<?php echo htmlspecialchars($post['image'] ?: 'default-post.jpg'); ?>" 
                class="card-img-top" 
                alt="<?php echo htmlspecialchars($post['title']); ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h5>
                <p class="text-muted mb-0">
                  <?php echo date("F j, Y", strtotime($post['created_at'])); ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center">
          <p class="text-muted">No posts yet.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="section wave">
  <img src="images/backgrounds/wave-bg.svg" class="wave-bg">
  <section class="section-sm">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
          <div class="image-wrapper">
            <img class="img-fluid w-100" 
              src="images/profiles/<?php echo htmlspecialchars($users[1]['profile_image'] ?? 'default.png'); ?>" 
              alt="<?php echo htmlspecialchars($users[1]['username'] ?? ''); ?>">
          </div>
        </div>
        <div class="col-lg-5 col-md-6">
          <div class="content pl-lg-3 pl-0">
            <h2>Hello, I'm <?php echo htmlspecialchars($users[1]['username'] ?? ''); ?>!</h2>
            <p><?php echo htmlspecialchars($users[1]['bio'] ?? 'This writer hasn’t shared a bio yet.'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

      <?php if (!empty($user_posts)): ?>
        <?php foreach ($user_posts as $post): ?>
          <div class="col-lg-3 col-sm-6 text-center mb-4">
            <div class="card border-0 shadow-sm h-100">
              <img 
                src="images/posts/<?php echo htmlspecialchars($post['image'] ?: 'default-post.jpg'); ?>" 
                class="card-img-top" 
                alt="<?php echo htmlspecialchars($post['title']); ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h5>
                <p class="text-muted mb-0">
                  <?php echo date("F j, Y", strtotime($post['created_at'])); ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center">
          <p class="text-muted">No posts yet.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
</section>

  <section class="section-sm">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
          <div class="image-wrapper">
            <img class="img-fluid w-100" 
              src="images/profiles/<?php echo htmlspecialchars($users[2]['profile_image'] ?? 'default.png'); ?>" 
              alt="<?php echo htmlspecialchars($users[2]['username'] ?? ''); ?>">
          </div>
        </div>
        <div class="col-lg-5 col-md-6">
          <div class="content pl-lg-3 pl-0">
            <h2>Hello, I'm <?php echo htmlspecialchars($users[2]['username'] ?? ''); ?>!</h2>
            <p><?php echo htmlspecialchars($users[2]['bio'] ?? 'This writer hasn’t shared a bio yet.'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>


<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mb-5">
        <h2>Educational Qualification <br> That I Have Gathered</h2>
      </div>

      <div class="col-lg-3 col-sm-6 text-center mb-4">
        <h3 class="border-bottom pb-3 mb-3 mx-2">BEng Electronic Engineering</h3>
        <p class="mb-2">September 2000 - May 2004</p>
        <p>University Of California</p>
      </div>
      
      <div class="col-lg-3 col-sm-6 text-center mb-4">
        <h3 class="border-bottom pb-3 mb-3 mx-2">MSc in Research Methodology</h3>
        <p class="mb-2">September 2000 - May 2004</p>
        <p>University Of California</p>
      </div>
      
      <div class="col-lg-3 col-sm-6 text-center mb-4">
        <h3 class="border-bottom pb-3 mb-3 mx-2">BEng Electronic Engineering</h3>
        <p class="mb-2">September 2000 - May 2004</p>
        <p>University Of California</p>
      </div>
      
      <div class="col-lg-3 col-sm-6 text-center mb-4">
        <h3 class="border-bottom pb-3 mb-3 mx-2">MSc in Research Methodology</h3>
        <p class="mb-2">September 2000 - May 2004</p>
        <p>University Of California</p>
      </div>
      
    </div>
  </div>
</section>
</section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content border-0 bg-transparent">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>


<footer class="footer">
  <svg class="footer-border" height="214" viewBox="0 0 2204 214" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M2203 213C2136.58 157.994 1942.77 -33.1996 1633.1 53.0486C1414.13 114.038 1200.92 188.208 967.765 118.127C820.12 73.7483 263.977 -143.754 0.999958 158.899"
      stroke-width="2" />
  </svg>
  
  <div class="instafeed text-center mb-5">
      <h2 class="h3 mb-4">INSTAGRAM POST</h2>
      
      <div class="instagram-slider">
        <div class="instagram-post"><img src="images/instagram/1.jpg"></div>
        <div class="instagram-post"><img src="images/instagram/2.jpg"></div>
        <div class="instagram-post"><img src="images/instagram/4.jpg"></div>
        <div class="instagram-post"><img src="images/instagram/3.jpg"></div>
        <div class="instagram-post"><img src="images/instagram/2.jpg"></div>
        <div class="instagram-post"><img src="images/instagram/1.jpg"></div>
        <div class="instagram-post"><img src="images/instagram/3.jpg"></div>
        <div class="instagram-post"><img src="images/instagram/4.jpg"></div>
        <div class="instagram-post"><img src="images/instagram/2.jpg"></div>
        <div class="instagram-post"><img src="images/instagram/4.jpg"></div>
      </div>
  </div>
  
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