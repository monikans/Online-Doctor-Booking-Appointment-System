<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $query = $_POST["query"];

    // Database connection parameters
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "doctor appointment"; // Replace with your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO queries (Name, Ph_no, Email, query) VALUES (?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssss", $name, $number, $email, $query);

    // Execute statement
    if ($stmt->execute()) {
        header("Location: home.html");
        exit(); // Ensure that no further output is sent
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect back to the contact form page if accessed directly without form submission
    header("Location: contactus.html");
    exit();
}
?>
