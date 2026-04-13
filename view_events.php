<?php
include("config.php");
$result = $conn->query("SELECT * FROM events ORDER BY event_date ASC");
?>

<!DOCTYPE html>
<html>
<head>
<title>View Events</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<div class="sidebar">
    <h2>EMS</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="add_event.php">Add Event</a>
    <a href="view_events.php">View Events</a>
    <a href="logout.php">Logout</a>
</div>

<div class="content">
<h2>All Events</h2>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Date</th>
<th>Location</th>
<th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['event_name']; ?></td>
<td><?php echo $row['event_date']; ?></td>
<td><?php echo $row['event_location']; ?></td>
<td>
<a href="delete_event.php?id=<?php echo $row['id']; ?>">
<button>Delete</button>
</a>
</td>
</tr>
<?php } ?>

</table>
</div>

</div>
</body>
</html>