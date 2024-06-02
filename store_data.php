<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "Psrpk@2004";
$database = "event_planners_db";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database
$sql_create = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql_create) !== TRUE) {
    die("Error creating database: " . $conn->error);
}

// Connect to the database
$conn->close();
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS form_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    yourFirstName VARCHAR(50) NOT NULL,
    yourLastName VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    eventDate DATE NOT NULL,
    location VARCHAR(100) NOT NULL,
    howFound VARCHAR(50) NOT NULL,
    interestedIn TEXT,
    howHelp TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($table_sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $yourFirstName = $_POST['yourFirstName'];
    $yourLastName = $_POST['yourLastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $eventDate = $_POST['eventDate'];
    $location = $_POST['location'];
    $howFound = $_POST['howFound'];
    $interestedIn = $_POST['interestedIn'];
    $howHelp = $_POST['howHelp'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO form_data (yourFirstName, yourLastName, email, phone, eventDate, location, howFound, interestedIn, howHelp)
    VALUES ('$yourFirstName', '$yourLastName', '$email', '$phone', '$eventDate', '$location', '$howFound', '$interestedIn', '$howHelp')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2 style='color: green;'>Thank you! Your information has been submitted successfully.</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Form not submitted.";
}

// Close connection
$conn->close();
?>
