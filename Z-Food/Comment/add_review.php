<?php
// Include the database connection file
require '../Database/init.php';


// Get the product ID from the URL
$product_id = $_POST['product_id'];

// Get the posted data
$author = htmlspecialchars($_POST['author'], ENT_QUOTES, 'UTF-8');
$rating = intval($_POST['rating']); // Convert to integer
$review = htmlspecialchars($_POST['review'], ENT_QUOTES, 'UTF-8');

// Validate the data
if (empty($author)) {
  echo 'Please enter your name.';
  exit;
}

if ($rating < 1 || $rating > 5) {
  echo 'Please enter a rating between 1 and 5.';
  exit;
}

if (empty($review)) {
  echo 'Please enter your review.';
  exit;
}

// Insert the review into the database
$query = $db->prepare("INSERT INTO reviews (product_id, author, rating, review, created_at) VALUES (?, ?, ?, ?, NOW())");
$query->execute(array($product_id, $author, $rating, $review));

// Redirect the user back to the product page
header('Location: add_comment.php?product_id=' . $product_id);
?>

