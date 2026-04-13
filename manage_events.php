<?php
include("config.php");
include("auth_admin.php");

$result = $conn->query("SELECT * FROM events WHERE status='approved'");
?>

<!DOCTYPE html>
<html>

<head>
<title>Manage Events</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header>
<h2>Manage Approved Events</h2>
<a href="admin_dashboard.php">Back</a>
</header>

<div class="container">

<?php

while($row = $result->fetch_assoc()){

?>

<div class="event-card">

<h3><?php echo $row['event_name']; ?></h3>

<p>Date: <?php echo $row['event_date']; ?></p>
<p>Location: <?php echo $row['event_location']; ?></p>

<p>Live Status: <?php echo $row['live_status']; ?></p>

<?php if($row['live_status']=="no"){ ?>

<a href="start_live.php?id=<?php echo $row['id']; ?>">
<button>Start Live</button>
</a>

<?php } else { ?>

<a href="stop_live.php?id=<?php echo $row['id']; ?>">
<button>Stop Live</button>
</a>

<?php } ?>

</div>

<?php } ?>

</div>

</body>
</html>