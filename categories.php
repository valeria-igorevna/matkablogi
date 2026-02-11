<?php
session_start();
//include "database.php";
require_once __DIR__ . '/includes/database.php';

if(!isset($_SESSION['user_id'])){
    echo "You are not admin";
    header("location: login.php");
    }else{
    if($_SESSION['user_role'] == "admin"){
if(isset($_POST['submit'])){
$name = $_POST['name'];
$sql = "INSERT INTO categories(name)VALUES('$name')";
$result = mysqli_query($conn, $sql);
        if(!$result){
            echo "Error!: {$conn->error}";
}else{
    echo "Success";
}
}
    }else{
        header("location: login.php");
    }}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category</title>
</head>
<body>
  <form action="categories.php" method="POST">
    <input type="text" name="name">
    <input type="submit" name="submit" value="Add category">
    <a href='author-single.php'>Back to Profile</a>
  </form>
</body>
</html>