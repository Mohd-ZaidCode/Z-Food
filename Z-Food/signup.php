<?php
require 'Database/init.php';
include 'template/header.php';
include 'template/Bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username is unique
    $query = "SELECT username FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            echo "Username already exists. Please choose another username.";
        } else {
            // Check password complexity
            if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[A-Za-z\d!@#$%^&*()_+{}:;<>,.?~=-]{8,10}$/', $password)) {
                // Hash the password securely
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Create a prepared statement to insert the user
                $insertQuery = "INSERT INTO users (username, password) VALUES (?, ?)";
                $insertStmt = mysqli_prepare($conn, $insertQuery);

                if ($insertStmt) {
                    mysqli_stmt_bind_param($insertStmt, "ss", $username, $hashedPassword);
                    
                    // Execute the prepared statement to insert the user
                    if (mysqli_stmt_execute($insertStmt)) {
                        echo "Account created successfully!";
                    } else {
                        echo "Error creating account.";
                    }

                    // Close the insert prepared statement
                    mysqli_stmt_close($insertStmt);
                } else {
                    // Handle the SQL statement error for insertion
                    echo "SQL statement error (insertion)";
                }
            } else {
                echo "Password must be 8 to 10 characters long and contain at least one letter, one number, and special characters.";
            }
        }

        // Close the select prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // Handle the SQL statement error for username check
        echo "SQL statement error (username check)";
    }

    // Close the database connection when done
    mysqli_close($conn);
}
?>
<h2>Sign Up</h2>
<form action="signup.php" method="post">
  <div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" name="username" placeholder="Username" required class="form-control" >
    </div>
  </div>
  <div class="form-group row">
    <label for="Password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" placeholder="Password" required class="form-control" >
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Female
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
          <label class="form-check-label" for="gridRadios3">
           Other
          </label>
        </div>
      </div>
    </div>
  </fieldset>


  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Sign up</button>
    </div>
  </div>
</form>





<?php include 'template/footer.php'; ?>
