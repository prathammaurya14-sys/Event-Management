<?php
include("config.php");
include("auth_user.php");

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
<h2>User Dashboard</h2>
<nav>
<a href="index.php">Home</a>
<a href="logout.php">Logout</a>
</nav>
</header>

<div class="container">

<!-- Sidebar -->
<div class="sidebar">

<h3>User Panel</h3>

<a href="user_dashboard.php">My Events</a>
<a href="add_event_request.php">Add Event</a>

</div>

<!-- Content -->
<div class="content">

<h2>Welcome <?php echo $_SESSION['username']; ?></h2>

<h3>Your Events</h3>

<?php
$user = $_SESSION['username'];

$result = $conn->query("SELECT * FROM events WHERE user_name='$user'");

while($row = $result->fetch_assoc()){
?>

<div class="event-card">

<h3><?php echo $row['event_name']; ?></h3>

<p>Date: <?php echo $row['event_date']; ?></p>

<p>Location: <?php echo $row['event_location']; ?></p>

<p><b>Time:</b> <?php echo $row['event_time']; ?></p>

<p>Status: <?php echo $row['status']; ?></p>

<a href="edit_event_request.php?id=<?php echo $row['id']; ?>">Edit</a>

<a href="cancel_event_request.php?id=<?php echo $row['id']; ?>">Cancel</a>

</div>

<?php } ?>

</div>
</div>

</body>
</html>