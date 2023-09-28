<?php
require 'Database/init.php';
include 'template/header.php';
include 'template/Bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create a prepared statement
    $query = "SELECT id, username, password FROM users WHERE username=?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Bind the username parameter to the prepared statement
        mysqli_stmt_bind_param($stmt, "s", $username);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        if ($result && $row = mysqli_fetch_assoc($result)) {
            // Verify the hashed password
            if (password_verify($password, $row['password'])) {
                // Authentication successful
                $_SESSION['user_id'] = $row['id'];
                header('Location: index.php');
                exit();
            } else {
                // Incorrect password
                echo '
                <html>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Invalid user!</strong> Please check your username or password
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                </html>';
            }
        } else {
            // Username not found
            echo '
            <html>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Invalid user!</strong> Please check your username or password
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </html>';
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // Handle the SQL statement error
        echo "SQL statement error";
    }

    // Close the database connection when done
    mysqli_close($conn);
}
?>





<!--THis is bootstarp-->
<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
  </head>
  <body
 
  

    
    >



  <!-- <h2>Login</h2> -->
<!--form started here-->
  <!-- <form action="login.php" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" aria-describedby="username"
     name="username" placeholder="Username" required>

    <small id="emailHelp" class="form-text text-muted">Please enter correct username and password</small>
  </div>
  <div class="form-group">
    <label for="Pass">Password</label>
    <input type="password" name="password"class="form-control" id="pass" placeholder="Password"required>
  </div> 
  <button type="login" class="btn btn-primary">Submit</button>
</form> -->
<!-- form ends here -->




<header id= "home-section">
        <div class="dark-overlay w-100">
            <div class="home-inner container p-4">
                <div class="row">
                    <div class="col-lg-8 d-none d-lg-block">
                        <h1 class="display-4"> <strong>Connect</strong> With others!!</h1>
                        <div class="d-flex">
                            <div class="p-4 align-self-start">
                                <i class="fa fa-check fa-2x"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                Lorem ipsum, dolor sit elit. Inventore , consequatur nemo in eligendi?
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="p-4 align-self-start">
                                <i class="fa fa-check fa-2x"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                Lorem ipsum dolor sit amet elit. Atque!
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="p-4 align-self-start">
                                <i class="fa fa-check fa-2x"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                Lorem ipsum dolor, sit amet consectetur porro fugiat ullam dolorem?
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-primary text-center card-form">
                            <div class="card-body">
                                <h3>Login</h3>
                                <p>Please submit your details</p>
                                <form action="login.php" method="post">
                                    <div class="form-group mb-2">
                                         <input type="text"  id="username" aria-describedby="username"
                                        name="username" placeholder="Username" required class= "form-control form-control-lg" >
                                    </div>
                                   
                                    <div class="form-group mb-2">
                                        <input type="password" name="password" id="pass" placeholder="Password"required class= "form-control form-control-lg" >
                                    </div>
                                    
                                    <input type="submit" value= "Submit" class= "btn btn-outline-light w-100">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--EXPLORE Header -->
    <section id="exploreSection">
        <div class="container">
            <div class="row">
                <div class="col text-center py-5">
                    <h1 class="display-4">Explore</h1>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid dolore quisquam nihil voluptas labore repellat.</p>
                    <a href="#" class="btn btn-outline-secondary">Find out More...</a>
                </div>
            </div>
        </div>
    </section>

    <!-- EXPLORE ELAB SECTION-->
    <section id="exploreElabSection" class="bg-light text-muted py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="img/compass.jpg" alt="a bronze-colored compass is held in someone's hand. It is held at arm's length at eye-level. " class= "img-fluid mb-3 rounded-circle col-md-12 col-xs-6">
                </div>
                <div class="col-md-6">
                    <h3>Explore & Connect</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero earum eligendi veritatis sint. Laboriosam error repellendus aliquam impedit dolore sint perferendis, excepturi neque quod, fuga eius expedita doloremque fugiat quisquam!</p>
                    <div class="d-flex">
                        <div class="p-4 align-self-start">
                            <i class="fa fa-check fa-2x"></i>
                        </div>
                        <div class="p-4 align-self-end">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat, id!
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="p-4 align-self-start">
                            <i class="fa fa-check fa-2x"></i>
                        </div>
                        <div class="p-4 align-self-end">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae, et.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--HORIZONTAL DIVIDER-->
    <!-- <hr id= "hr1"></hr> -->
    <!--CREATE HEAD SECTION-->
    <section id="createSection" class= "bg-light">
        <div class="container">
            <div class="row">
                <div class="col text-center py-5 text-dark">
                    <h1 class="display-4">Create</h1>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid dolore quisquam nihil voluptas labore repellat.</p>
                    <a href="#" class="btn btn-outline-info">Find out More...</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CREATE ELAB SECTION-->
    <section id="createElabSection" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-2">
                    <img src="img/create.jpg" alt="a bronze-colored compass is held in someone's hand. It is held at arm's length at eye-level. " class= "img-fluid mb-3 rounded-circle col-md-12 col-xs-6">
                </div>
                <div class="col-md-6 order 1">
                    <h3>Create Your Passion</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero earum eligendi veritatis sint. Laboriosam error repellendus aliquam impedit dolore sint perferendis, excepturi neque quod, fuga eius expedita doloremque fugiat quisquam!</p>
                    <div class="d-flex">
                        <div class="p-4 align-self-start">
                            <i class="fa fa-check fa-2x"></i>
                        </div>
                        <div class="p-4 align-self-end">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat, id!
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="p-4 align-self-start">
                            <i class="fa fa-check fa-2x"></i>
                        </div>
                        <div class="p-4 align-self-end">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae, et.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- HORIZONTAL DIVIDER-->
    <hr></hr>
        <!--SHARE Header -->
        <section id="shareSection">
            <div class="container">
                <div class="row">
                    <div class="col text-center py-5">
                        <h1 class="display-4">Share</h1>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid dolore quisquam nihil voluptas labore repellat.</p>
                        <a href="#" class="btn btn-outline-secondary">Find out More...</a>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- SHARE ELAB SECTION-->
        <section id="shareElabSection" class="bg-light text-muted py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/share.jpg" alt="a bronze-colored compass is held in someone's hand. It is held at arm's length at eye-level. " class= "img-fluid mb-3 rounded-circle col-md-12 col-xs-6">
                    </div>
                    <div class="col-md-6">
                        <h3>Share Your Work</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero earum eligendi veritatis sint. Laboriosam error repellendus aliquam impedit dolore sint perferendis, excepturi neque quod, fuga eius expedita doloremque fugiat quisquam!</p>
                        <div class="d-flex">
                            <div class="p-4 align-self-start">
                                <i class="fa fa-check fa-2x"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat, id!
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="p-4 align-self-start">
                                <i class="fa fa-check fa-2x"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae, et.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- FOOTER -->
        <footer id= "footer-main" class="bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col text-center py-3">
                        <h3>Bay Leaves</h3>
                        <p>Copyright &copy; <span id="year"></span></p>
                        <button class="btn btn-outline-light" data-toggle= "modal" data-target= "#contactUs">Contact Us!</button>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- TESTING BUTTON-MODAL CONNECTIONS-->
        <!--
        <button class="btn btn-info" data-toggle= "modal" data-target= "#myModal">Test Modal</button>
        <div id= "myModal" class="modal"></div>
        -->
        
        <!-- Contact us Modal -->
        <div  id= "contactUs" class="modal fade text-dark">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Contact Us</h5>
                        <button class="btn close" data-dismiss= "modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" placeholder= "Full Name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class= "form-control" placeholder= "Email Address">
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control"></textarea>
                            </div>
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-block">Submit</button>
                    </div>
                </div>
            </div>
        </div>

    <!--
    <span id= "year"></span> -->
    <!-- JQUERY MIN FROM URL: http://code.jquery.com/  (jQuery Core-> min) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--Get the libraries below from bootstrap js bundles (separate)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    
    <!-- USING OLDER VERSION BELOW TO MAKE MODAL-BUTTON TRIGGERS WORK!-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
    <script>
        // Get current year for the copyright
        $('#year').text(new Date().getFullYear());

        //Init ScrollSpy
        $('body').scrollspy({ target: "#navTracker"});

        //Implement Smooth Scrolling;
        $("#navTracker a").on('click', function(e){
            if (this.hash !== '') {

                e.preventDefault();

                const hash= this.hash;

                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                    }, 900, function() {
                        window.location.hash= hash;
                    });
            }
        }); 

        

    </script>





<?php include 'template/footer.php'; ?>
