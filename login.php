<?php
$username = $_POST["username"];
$password = $_POST["password"];

// Database connection
$conn = new mysqli('localhost','root','','doctor appointment');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    
    $stmt = $conn->prepare("select * from admin where username = ? and password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt_res = $stmt->get_result();
    if($stmt_res->num_rows > 0){
        header("Location:viewadmin.html");
    } else {
        echo '<script>alert("invalid username or password"); location.replace(document.referrer);</script>';
    }
}
?>