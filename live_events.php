<?php
include("config.php");

/* Fetch live events */
$result = $conn->query("SELECT * FROM events WHERE live_status='yes' AND status='approved' ORDER BY event_date ASC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Live Events</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<!-- HEADER -->
<header>
<h2>EventPro</h2>

<nav>
<a href="index.php">Home</a>
<a href="live_events.php">Live Events</a>
<a href="login.php">Login</a>
<a href="register.php">Register</a>
</nav>

</header>


<div class="container">

<!-- SIDEBAR -->
<div class="sidebar">

<h3>Event Categories</h3>

<a href="index.php#Wedding">Wedding</a>
<a href="index.php#Birthday">Birthday</a>
<a href="index.php#Music">Music</a>
<a href="index.php#Concert">Concert</a>
<a href="index.php#Festivals">Festivals</a>
<a href="index.php#Comedy">Comedy</a>
<a href="index.php#Food & Drinks">Food & Drinks</a>
<a href="index.php#Business">Business</a>

</div>


<!-- CONTENT -->
<div class="content">

<div class="back-btn">
<button onclick="history.back()">← Back</button>
</div>

<h2>🔴 Live Events</h2>

<?php if($result->num_rows > 0){ ?>

<div class="event-container">

<?php while($row = $result->fetch_assoc()){ ?>

<div class="event-card">

<h3><?php echo $row['event_name']; ?></h3>

<p><strong>Date:</strong> <?php echo $row['event_date']; ?></p>

<p><strong>Time:</strong> <?php echo $row['event_time']; ?></p>

<p><strong>Location:</strong> <?php echo $row['event_location']; ?></p>

<p><?php echo $row['description']; ?></p>

<p style="color:red;font-weight:bold;">🔴 LIVE NOW</p>

</div>

<?php } ?>

</div>

<?php } else { ?>

<p>No live events right now.</p>

<?php } ?>

</div>

</div>


<!-- FOOTER -->
<footer>
© <?php echo date("Y"); ?> Event Management System | All Rights Reserved
</footer>

</body>
</html>