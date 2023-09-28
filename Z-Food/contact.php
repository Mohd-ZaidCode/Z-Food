
<?php
require 'Database/init.php';

// Get the username, message, and file upload from the form
$username = $_POST['username'];
$message = $_POST['message'];
$file_name = $_FILES['file_upload']['name'];
$file_tmp_name = $_FILES['file_upload']['tmp_name'];

// Define allowed MIME types
$allowedMimeTypes = ['image/jpeg', 'image/png'];

// Check if the uploaded file is a valid image
if (in_array($_FILES['file_upload']['type'], $allowedMimeTypes)) {
    // Generate a unique file name to prevent overwriting existing files
    $uniqueFileName = uniqid() . '_' . $file_name;

    // Define the target directory for uploads
    $uploadDirectory = 'uploads/';

    // Check if the upload directory exists; create it if not
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    // Set the target path for the uploaded file
    $targetPath = $uploadDirectory . $uniqueFileName;

    // Insert the data into the database with the new file name
    $query = $db->query("INSERT INTO contacts (username, message, file_name) VALUES ('$username', '$message', '$uniqueFileName')");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: "Roboto Mono", monospace;
        }

        .message-box {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .message {
            font-size: 36px;
            font-weight: bold;
            color: black;
        }

        .home-button {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 10px 20px;
            background-color: black ;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <a href="index.php" class="home-button">Home</a>
    <div class="message-box">
        <div class="message">
            
            
            
            <?php
    if ($query && move_uploaded_file($file_tmp_name, $targetPath)) {
        // Redirect to the success page
        echo '<html><a href="uploads/' . $uniqueFileName . '">File uploaded successfully</a></html>';
    } else {
        // Show an error message
        echo 'There was an error uploading the file or submitting your form. Please try again.';
    }
} else {
    // Invalid file type
    echo 'Invalid file type. Only PNG and JPG files are allowed.';
}

?>
            
            
            
          
        </div>
    </div>


