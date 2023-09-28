<!DOCTYPE html>
<!doctype html>
<html lang="en">
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <html lang="en">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Review</title>
</head>

<body   class="p-3 m-0 border-0 bd-example m-0 border-0"  style="background-image: url('../images/banner-images/s.jpg');">

  
  <?php
require '../database/init.php';
include '../template/Bootstrap.php';
// Get the product ID from the URL
$product_id = $_GET['product_id'];
// Get the product details from the database
$query = $db->query("SELECT * FROM products WHERE id='$product_id'");
$product = $query->fetch();

// Get the reviews for the product
$query = $db->query("SELECT * FROM reviews WHERE product_id='$product_id' ORDER BY created_at DESC");
$reviews = $query->fetchAll();

?>
<nav class="navbar bg-body-tertiary">
  <form class="container-fluid justify-content-start">
    <button class="btn btn-outline-success me-2"style="background-color:white;" type="button"><a href="../index.php">Home</a></button>
    <button class="btn btn-outline-success me-2" style="background-color:white;" type="button"><a href="../logout.php">logout</a></button>
  </form>
</nav>
<h3>Add a Review</h3>



<form action="add_review.php" method="post">
<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
<div class="mb-3">

  <label for="exampleFormControlInput1" class="form-label">Your name</label>
  <input type="text" name="author" class="form-control" id="exampleFormControlInput1" placeholder="Name">
</div>
<input type="number" name="rating" min="1" max="5" placeholder="Rating (1-5)" class="form-control" id="exampleFormControlInput1">
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Review</label>
  <textarea class="form-control"name="review" id="exampleFormControlTextarea1" rows="3" placeholder="Your review"></textarea>
</div>
<button type="submit" class="btn btn-primary btn-lg">Submit review</button>
 
  <!-- <input type="text" name="author" placeholder="Your name">
  <input type="number" name="rating" min="1" max="5" placeholder="Rating (1-5)">
  <textarea name="review" placeholder="Your review"></textarea>
  <input type="submit" value="Submit Review"> -->
</form>



  <h1>Product</h1>

  <div class="card mb-3">
  <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo $product['name']; ?></h5>
    <p class="card-text"><?php echo $product['description']; ?></p>

  </div>
</div>

  <h3>Reviews</h3>

  <?php foreach ($reviews as $review) : ?>
    <div class="review">

    <div class="card">
      <h5 class="card-header">Rating: <?php echo $review['rating']; ?>⭐</h5>
      <div class="card-body">
        <h5 class="card-title">By: <?php echo $review['author']; ?></h5>
        <p class="card-text"><?php echo $review['review']; ?></p>
        <p>:<?php echo $review['created_at']; ?></p>
      </div>
    </div>



    
  <?php endforeach; ?>



</body>
</html>
