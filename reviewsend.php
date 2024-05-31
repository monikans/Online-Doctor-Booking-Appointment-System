<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $review = $_POST["review"];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'doctor appointment');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        // Insert user data into the 'recipients' table
        $insertStmt = $conn->prepare("insert into reviews (username, review)
            VALUES (?, ?)");

        $insertStmt->bind_param("ss", $username, $review);

        if ($insertStmt->execute()) {
            header("Location: home.html");
            // You can redirect to a success page if needed
        } else {
            echo "<h3>Error: " . $insertStmt->error . "</h3>";
        }

        // Close the database connection
        $conn->close();
    }
} else {
    // Redirect back to the sign-up page if accessed directly
    header("Location: home.html");
}
?>