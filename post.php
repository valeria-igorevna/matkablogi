<?php
session_start();
$user_id = $_SESSION['user_id'];
//include "database.php";
require_once __DIR__ . '/includes/database.php';

if (!isset($_SESSION['user_id'])){
    header("Location: login.php");
//    exit();
}else{
// Only authors and admins can create posts
if ($_SESSION['user_role'] == "author" || $_SESSION['user_role'] == "admin") {
        $sql = "select * from categories";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "Error!: {$conn->error}";
        }else{
          if(isset($_POST['submit'])){
          $title = $_POST['title'];
          $excerpt = $_POST['excerpt'];
          $content = $_POST['content'];
          $categories_name = $_POST['categories_name'];
          $name = $_FILES['image']['name'];
          $temp_location = $_FILES['image']['tmp_name'];
          $our_location = "images/post/";
             if(!empty($name)){
                move_uploaded_file($temp_location, $our_location.$name);
            }
          $sql1 = "SELECT id FROM categories WHERE name = '$categories_name'"; 
          $result1 = mysqli_query($conn, $sql1);
          if($result1->num_rows>0){
          $row = mysqli_fetch_assoc($result1);
          $idforcategory = $row['id'];
          }
          $sql2 = "INSERT INTO post(title, excerpt, content, author_id, category_id, categories_name, image)VALUES('$title', '$excerpt', '$content', '$user_id', '$idforcategory', '$categories_name', '$name')";
          $result2 = mysqli_query($conn, $sql2);
          if($result2){
          echo"post OK"; //POISTA TAI KORVAA TÄMÄ TEKSTI MYÖHEMMIN!!!
          }
          }
        }
        }else{
        header("location: login.php");
    }
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

            <!-- logout -->
     <li class="logout">
    <a class="btn btn-outline-primary" href="logout.php">Logout</a>
  </li>

    </nav>
  </div>
</header>
<!-- /navigation -->

  <div class="header text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 mx-auto">
        <h1 class="mb-4">Tell Your Story</h1>
        <ul class="list-inline">
          <li class="list-inline-item"><a class="text-default" href="author-single.php">Back to Profile
              &nbsp; &nbsp; /</a></li>
          <li class="list-inline-item text-primary">Create a post</li>
        </ul>
      </div>
    </div>
  </div>


<!--Post Form-->
<div class="post">
  <form action="post.php" method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Enter post title" required>
    <input type="text" name="excerpt" placeholder="A short summary of your post...">
    <textarea name="content" placeholder="Write your blog post here..." required></textarea>
    
    <!-- Categories Dropdown -->
     <h4>Select a category</h4>
    <select name="categories_name" required>
    <?php while ($row = mysqli_fetch_assoc($result)){ ?>
      <option value="<?php echo "{$row['name']}";?>"><?php echo "{$row['name']}";?></option>
          <?php } 
    ?>
    </select>
    
    <input type="file" class="post-image" name="image" required>
    <button class="btn btn-outline-primary" type="submit" name="submit">Publish</button>
  </form>
</div>



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