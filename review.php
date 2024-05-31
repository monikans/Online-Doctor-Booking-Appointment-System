<?php

// Username is root
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'doctor appointment';

// Server is localhost with
// port number 3306
$servername='localhost';
$mysqli =new mysqli('localhost','root','','doctor appointment');

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql = " SELECT * FROM reviews";
$result = $mysqli->query($sql);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocInTouch</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="review.css">
</head>
<body>

    <header class="header">
        <a href="#" class="logo"><i class="fas fa-heartbeat"></i>DocInTouch</a>
        <nav class="navbar">
            <a href="home.html">Home</a>
            <a href="services.html">Services</a>
            <a href="doctors.html">Doctors</a>
            <a href="departments.html">Departments</a>
            <a href="about.html">About</a>
            <a href="forDoctors.html">For Doctors</a>
            <a href="login.html">Login</a>
        </nav>
        
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

<section class="review" id="review">
    <h1 class="heading">Client's <span>Review</span></h1>
    <form action="reviewsend.php" method="post">
        <div class="rev">
            <input type="text" name="username" placeholder="Your name" class="box" required>
            <input type="text" name="review" placeholder="Write your review here" class="box"  required><br>
            <button type="submit" class="btn">Submit Review</button>
        </div>
    </form>
    <div class="box-container">
        <div class="box">
            <h3>User123</h3>
            <p class="text">i dont normally talk to doctors online. this is the first time. and i have to say it was a good experience. doctor responded in about 7-8 minutes. first asked many questions to understand my situation and then explained my case to me with symptoms, causes and diagnosis.
                so awesome! will return and recommend my friends also!</p>
        </div>

        <div class="box">
            <h3>Susan</h3>
            <p class="text">great experience. doctor answered quickly, solved issues, asked many questions to understand my case. i told about past history and thanks for listening to it so patiently. among doctors this is difficult to find - patience to listen to earlier history. so thanks. very happy.
                ill let you know about progress.</p>
        </div>
        <?php 
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
        <div class="box">
            <h3><?php echo $rows['username'];?></h3>
            <p class="text"><?php echo $rows['review'];?></p>
        </div>
        <?php
                }
        ?>
    </div>
</section>

</body>
</html>
