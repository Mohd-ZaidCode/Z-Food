<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Listing</title>
</head>
<body>
<?php
require '../database/init.php';
include '../template/Bootstrap.php';

// Get the product details from the database
$query = $db->query("SELECT * FROM products");
$products = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Listing</title>
</head>
<body style="background-image: url('../images/banner-images/review.jpg');" class="p-3 m-0 border-0 bd-example m-0 border-0">
<nav class="navbar bg-body-tertiary">
  <form class="container-fluid justify-content-start">
    <button class="btn btn-outline-success me-2"style="background-color:white;" type="button"><a href="../index.php">Home</a></button>
    <button class="btn btn-outline-success me-2" style="background-color:white;" type="button"><a href="../logout.php">logout</a></button>
  </form>
</nav>

  <h1>Product Listing</h1>

  <div id="products">
    <?php foreach ($products as $product) : ?>
      <div class="product">

      <div class="card" style="width: 18rem;">
  <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo $product['name']; ?></h5>
    <p class="card-text"><?php echo $product['description']; ?></p>
    <a href="add_comment.php?product_id=<?php echo $product['id']; ?>"class="btn btn-primary">View Reviews</a>
  </div>
</div>



        
    <?php endforeach; ?>
  </div>

</body>
</html>
