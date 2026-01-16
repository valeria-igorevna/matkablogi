<?php
session_start();
//include "database.php";
require_once __DIR__ . '/includes/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Check if post_id is passed
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
} else {
    echo "Post not found.";
    exit();
}

// Only authors or admins can update posts
if ($_SESSION['user_role'] == "author" || $_SESSION['user_role'] == "admin") {
    // Fetch all categories
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error!: {$conn->error}";
        exit();
    }
} else {
    header("location: login.php");
    exit();
}

// Fetch the post data
$post_sql = "SELECT * FROM post WHERE id = '$post_id'";
$post_result = mysqli_query($conn, $post_sql);

if ($post_result && mysqli_num_rows($post_result) > 0) {
    $post_data = mysqli_fetch_assoc($post_result);
    $title_value = htmlspecialchars($post_data['title']);
    $excerpt_value = htmlspecialchars($post_data['excerpt']);
    $content_value = htmlspecialchars($post_data['content']);
    $category_id_value = $post_data['category_id'];
    $image_value = $post_data['image']; // assuming your post table has an image column
} else {
    echo "Post not found.";
    exit();
}

// Update the post if the form is submitted
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $excerpt = $_POST['excerpt'];
    $content = $_POST['content'];
    $categories_name = $_POST['categories_name'];

    // Handle image upload
    $name = $_FILES['image']['name'];
    $temp_location = $_FILES['image']['tmp_name'];
    $our_location = "images/post/";

    if (!empty($name)) {
        move_uploaded_file($temp_location, $our_location . $name);
    }

    // Get the category ID
    $sql1 = "SELECT id FROM categories WHERE name = '$categories_name'";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1->num_rows > 0) {
        $row = mysqli_fetch_assoc($result1);
        $idforcategory = $row['id'];
    }

    // Update query (only change image if a new one is uploaded)
    $update_image_sql = !empty($name) ? ", image = '$name'" : "";
    $sql2 = "UPDATE post 
            SET title = '$title', excerpt = '$excerpt', content = '$content', author_id = '$user_id', 
                category_id = '$idforcategory' $update_image_sql
            WHERE id ='$post_id'";

    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
        echo "Update OK"; // You can replace this with a redirect or success message
        // header("Location: author-single.php"); // for example
    } else {
        echo "Error updating post: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="utf-8">
  <title>Update Post | Exploring the World</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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
        <img class="img-fluid" width="100px" src="images/logo.png">
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
        <form class="search-bar mr-2 mb-0" role="search">
          <input id="search-query" name="s" type="search" class="form-control" placeholder="Destination..." style="width:200px;">
        </form>

        <!-- logout button -->
        <a class="btn btn-outline-primary ml-2" href="logout.php">Logout</a>
      </div>
    </nav>
  </div>
</header>

<!-- header -->
<div class="header text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 mx-auto">
        <h1 class="mb-4">Update Your Story</h1>
        <ul class="list-inline">
          <li class="list-inline-item"><a class="text-default" href="author-single.php">Back to Profile
              &nbsp; &nbsp; /</a></li>
          <li class="list-inline-item text-primary">Edit Post</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!--Post Form-->
<div class="post">
  <form action="updatepost.php?post_id=<?php echo $post_id ?>" method="post" enctype="multipart/form-data">
    
    <input type="text" name="title" placeholder="Enter post title" required 
           value="<?php echo $title_value; ?>">

    <input type="text" name="excerpt" placeholder="A short summary of your post..."
            value="<?php echo $excerpt_value; ?>">

    <textarea name="content" placeholder="Write your blog post here..." required><?php echo $content_value; ?></textarea>

    <select name="categories_name" required>
      <?php 
      mysqli_data_seek($result, 0); // reset pointer if needed
      while ($row = mysqli_fetch_assoc($result)) { 
        $selected = ($row['id'] == $category_id_value) ? 'selected' : '';
        echo "<option value='{$row['name']}' {$selected}>{$row['name']}</option>";
      } 
      ?>
    </select>

    <?php if (!empty($image_value)) { ?>
      <p>Current image:</p>
      <img src="images/post/<?php echo $image_value; ?>" width="150" alt="Current post image"><br>
    <?php } ?>

    <input type="file" class="post-image" name="image">
    <button class="btn btn-outline-primary" type="submit" name="submit">Update</button>
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
          <a href="index.html"><img class="img-fluid" width="100px" src="images/logo.png" alt=""></a>
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
