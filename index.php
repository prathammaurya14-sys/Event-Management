<?php
include("config.php");

/* Fetch only approved events */
$result = $conn->query("SELECT * FROM events WHERE status='approved' ORDER BY category, event_date ASC");

/* Store events by category */
$events = [];

while($row = $result->fetch_assoc()){
    $events[$row['category']][] = $row;
}

/* Event categories */
$categories = [
"Wedding",
"Birthday",
"Music",
"Concert",
"Festivals",
"Comedy",
"Food & Drinks",
"Business"
];
?>

<!DOCTYPE html>
<html>
<head>
<title>Event Management System</title>
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

<a href="#">Wedding</a>
<a href="#">Birthday</a>
<a href="#">Music</a>
<a href="#">Concert</a>
<a href="#">Festivals</a>
<a href="#">Comedy</a>
<a href="#">Food & Drinks</a>
<a href="#">Business</a>

</div>


<!-- CONTENT -->
<div class="content">

<div class="back-btn">
<button onclick="history.back()">← Back</button>
</div>

<h1>Welcome to EventPro</h1>
<p>Plan and manage your events efficiently using our platform.</p>


<?php foreach($categories as $cat){ ?>

<h2><?php echo $cat; ?> Events</h2>

<?php if(isset($events[$cat])){ ?>

<div class="event-container">

<?php foreach($events[$cat] as $row){ ?>

<div class="event-card">

<h3><?php echo $row['event_name']; ?></h3>

<p><strong>Date:</strong> <?php echo $row['event_date']; ?></p>

<p><strong>Time:</strong> <?php echo $row['event_time']; ?></p>

<p><strong>Location:</strong> <?php echo $row['event_location']; ?></p>

<p><?php echo $row['description']; ?></p>

</div>

<?php } ?>

</div>

<?php } else { ?>

<p>No events available.</p>

<?php } ?>

<?php } ?>

</div>

</div>


<!-- FOOTER -->
<footer>
© <?php echo date("Y"); ?> Event Management System | All Rights Reserved
</footer>

</body>
</html>