<?php
include("config.php");
include("auth_admin.php");

/* Pending event approvals */
$pending_events = $conn->query("SELECT * FROM events WHERE status='pending' ORDER BY id DESC");

/* Cancel requests */
$cancel_requests = $conn->query("SELECT * FROM events WHERE status='cancel_pending' ORDER BY id DESC");

/* Count pending approvals */
$pending_count = $conn->query("SELECT COUNT(*) AS total FROM events WHERE status='pending'");
$row_count = $pending_count->fetch_assoc();
$pending = $row_count['total'];

/* Count cancel requests */
$cancel_count = $conn->query("SELECT COUNT(*) AS total FROM events WHERE status='cancel_pending'");
$row_cancel = $cancel_count->fetch_assoc();
$cancel = $row_cancel['total'];
?>

<!DOCTYPE html>
<html>

<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header>
<h2>Admin Dashboard</h2>

<nav>
<a href="index.php">Home</a>
<a href="manage_events.php">Manage Events</a>
<a href="live_events.php">Live Events</a>
<a href="logout.php">Logout</a>
</nav>

</header>

<div class="container">

<!-- SIDEBAR -->

<div class="sidebar">

<h3>Admin Panel</h3>

<a href="admin_dashboard.php">
Event Requests

<?php if($pending > 0){ ?>
<span class="badge"><?php echo $pending; ?></span>
<?php } ?>

</a>

<a href="#cancel">
Cancel Requests

<?php if($cancel > 0){ ?>
<span class="badge"><?php echo $cancel; ?></span>
<?php } ?>

</a>

<a href="manage_events.php">Approved Events</a>

</div>


<!-- CONTENT -->

<div class="content">

<div class="back-btn">
<button onclick="history.back()">← Back</button>
</div>


<!-- Pending Event Requests -->

<h2>Pending Event Requests</h2>

<?php

if($pending_events->num_rows > 0){

while($row = $pending_events->fetch_assoc()){

?>

<div class="event-card">

<h3><?php echo $row['event_name']; ?></h3>

<p><b>Requested By:</b> <?php echo $row['user_name']; ?></p>

<p><b>Date:</b> <?php echo $row['event_date']; ?></p>

<p><b>Time:</b> <?php echo $row['event_time']; ?></p>

<p><b>Location:</b> <?php echo $row['event_location']; ?></p>

<p><b>Description:</b> <?php echo $row['description']; ?></p>

<br>

<a href="approve_event.php?id=<?php echo $row['id']; ?>">
<button>Approve</button>
</a>

<a href="reject_event.php?id=<?php echo $row['id']; ?>">
<button>Reject</button>
</a>

</div>

<?php
}

}else{

echo "<p>No pending event requests.</p>";

}

?>


<!-- Cancel Requests -->

<h2 id="cancel">Cancel Event Requests</h2>

<?php

if($cancel_requests->num_rows > 0){

while($row = $cancel_requests->fetch_assoc()){

?>

<div class="event-card">

<h3><?php echo $row['event_name']; ?></h3>

<p><b>User:</b> <?php echo $row['user_name']; ?></p>

<p><b>Date:</b> <?php echo $row['event_date']; ?></p>

<p><b>Time:</b> <?php echo $row['event_time']; ?></p>

<p><b>Location:</b> <?php echo $row['event_location']; ?></p>

<p><b>Status:</b> Cancel Request</p>

<br>

<a href="approve_cancel.php?id=<?php echo $row['id']; ?>">
<button>Approve Cancel</button>
</a>

<a href="reject_cancel.php?id=<?php echo $row['id']; ?>">
<button>Reject Cancel</button>
</a>

</div>

<?php
}

}else{

echo "<p>No cancel requests.</p>";

}

?>

</div>

</div>


<footer>
<p>© <?php echo date("Y"); ?> Event Management System</p>
</footer>

</body>
</html>