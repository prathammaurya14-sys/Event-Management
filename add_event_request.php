<?php
include("config.php");
include("auth_user.php");

$username = $_SESSION['username'];

if(isset($_POST['submit'])){

$event_name = $_POST['event_name'];
$event_date = $_POST['event_date'];
$event_location = $_POST['event_location'];
$description = $_POST['description'];
$event_time = $_POST['event_time'];
$category = $_POST['category'];

$sql = "INSERT INTO events (event_name,event_date,event_location,description,event_time,user_name,category,status,live_status)
VALUES ('$event_name','$event_date','$event_location','$description','event_time','$username','$category','pending','no')";

if($conn->query($sql)){
$message="Event request sent to admin.";
}
else{
    $message="event request sent to admin";
}
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Add Event</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header>
<h2>Add Event</h2>

<nav>
<a href="index.php">Home</a>
<a href="user_dashboard.php">Dashboard</a>
<a href="live_events.php">Live Events</a>
<a href="logout.php">Logout</a>
</nav>

</header>

<div class="container">

<div class="card">

<h2>Create Event</h2>

<form method="POST">

<label>Event Name</label>
<input type="text" name="event_name" required>

<label>Event Date</label>
<input type="date" name="event_date" min="<?php echo date('Y-m-d'); ?>" required>

<label>Event Location</label>
<input type="text" name="event_location" required>

<label>Event Category</label>
<select name="category" required>

<option value="">Select Category</option>
<option value="Bussiness">Bussiness</option>
<option value="Food&Drinks">Food&Drinks</option>
<option value="Comedy">Comedy</option>
<option value="Concert">Concert</option>
<option value="Festivals">Festivals</option>
<option value="Music">Music</option>
<option value="Birthday">Birthday</option>
<option value="Wedding">Wedding</option>

</select>

<label>Description</label>
<textarea name="description" required></textarea>

<label>Time</label>
<input type="time" name="event_time" required>

<button type="submit" name="submit">Submit Event Request</button>

</form>

</div>

</div>

<footer>
<p>© <?php echo date("Y"); ?> Event Management System</p>
</footer>

</body>
</html>