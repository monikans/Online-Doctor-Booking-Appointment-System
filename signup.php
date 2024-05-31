<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $district = $_POST["district"];
    $gender = $_POST["gender"];
    $nationalId = $_POST["national_id"];
    $registrationNumber = $_POST["registration_number"];
    $doctorType = $_POST["doctor_type"];
    $mobileNumber = $_POST["mobile_number"];
    $email = $_POST["email"]; // Hashing the password for security

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'doctor appointment');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        // Insert user data into the 'doctors' table
        $insertStmt = $conn->prepare("insert into doctors (First_name, last_name, district, gender, id, rg_no, dtype, ph_no, email)
            values (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $insertStmt->bind_param("sssssssss", $firstName, $lastName, $district, $gender, $nationalId, $registrationNumber, $doctorType, $mobileNumber, $email);

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
    // Redirect back to the registration page if accessed directly
    header("Location: home.html");
}
?>
