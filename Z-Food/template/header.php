<?php session_start();
  
?>
<!DOCTYPE html>
<html>
<head>
    <title>zaids website</title>
</head>


<!--navbar started here-->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">


  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <?php if (!isset($_SESSION['user_id'])) : 
      

      
      ?>

      <li class="nav-item active">
        <a class="nav-link" href="signup.php">Signup <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <?php else : ?>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="contact.html">Contact us</a>
      </li> 
      <?php endif; ?>     
    </ul>
  </div>
</nav>


