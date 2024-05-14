<?php
// Establishing a connection to the database
$servername = "localhost"; // Replace with your MySQL server name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "kanini"; // Replace with your MySQL database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieving form data
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// Inserting data into the database
$sql = "INSERT INTO kyalo (name, email, message)
VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
     // Store success message in session
     $_SESSION["success_message"] = "Record added successfully";

     // Print success message
     echo "Record added successfully. Redirecting...";
 
     // Redirect to login page
     header("refresh:2;url=kanini.html"); // Redirect after 2 seconds
     exit(); // Ensure no further code is executed after the redirect
    
} else {
    $_SESSION["error_message"] = "Error: " . $sql . "<br>" . $conn->error;

    // Redirect to login page (even if there was an error)
    header("Location: kanini.html");
    exit();
}

$conn->close();
?>
