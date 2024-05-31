<!-- PHP code to establish connection with the localserver -->
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
$sql = " SELECT * FROM queries";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Receipients Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		*{
    padding: 0px;
    margin: 0px;
}
body {
    font-family: Arial, sans-serif;
    background-image: url('https://img.freepik.com/free-photo/pastel-blue-vignette-concrete-textured-background_53876-102637.jpg?w=740&t=st=1710340964~exp=1710341564~hmac=003f94e5cf39802fc31c8a8f6a603c307f4458398eb4b817caf2f76dfeb3336d'); /* Replace 'your-background-image-url.jpg' with the URL of your background image */
    background-size: 100%;
    background-position: center;
    background-repeat: no-repeat;
}

.header {
    background-color:white;
    color:black;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.logo {
    color: #333; /* Logo color */
    text-decoration: none;
    font-size: 24px;
}

.navbar {
    display: flex;
    align-items: center;
}

.navbar a {
    text-decoration: none;
    color:black;
    margin-right: 20px;
    transition: color 0.3s ease;
}

.navbar a:hover {
    color: #ffc107;
}
		table {
			margin: 0 auto;
			font-size: small;
			padding: 20px;
			border: 3px rgb(84, 161, 146);
			border-color:rgb(84, 161, 146);
		}

		h1 {
			text-align: center;
			color: #1e3a69;
			font-size: large;
			padding: 40px;
			font-family: 'Kurale', sans-serif;
		}

		td {
			background-color:  rgb(229, 245, 242);
			border: 3px;
			border-color:rgb(84, 161, 146);
		}

		th,
		td {
			font-weight: bold;
			border: 3px rgb(84, 161, 146);
			border-color:rgb(84, 161, 146);
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kurale&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

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
	<a href="login.html" >Login<span class="fas fa-hevron-right"></span></a>

</nav>

<div id="menu-btn" class="fas fa-bars"></div>

</header>
	<section>
		<h1>USER QUERIES</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>Name</th>
                <th>Ph No</th>
                <th>Email</th>
				<th>Query</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php 
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
                <td><?php echo $rows['Name'];?></td>
                <td><?php echo $rows['Ph_no'];?></td>
                <td><?php echo $rows['Email'];?></td>
                <td><?php echo $rows['query'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
</body>

</html>
