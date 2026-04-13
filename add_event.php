<?php
include("config.php");

if(isset($_POST['add'])){
    $name = $_POST['event_name'];
    $date = $_POST['event_date'];
    $location = $_POST['event_location'];
    $desc = $_POST['description'];

    $conn->query("INSERT INTO events (event_name, event_date, event_location, description)
    VALUES ('$name','$date','$location','$desc')");

    echo "<script>alert('Event Added Successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Event</title>
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
                <div class="back-btn">
                    <button onclick="history.back()">← Back</button>
                </div>
                <h2>Add Event</h2>
                <form method="POST">
                    <input type="text" name="event_name" placeholder="Event Name" required>
                    <input type="date" name="event_date" required>
                    <input type="text" name="event_location" placeholder="Location" required>
                    <textarea name="description" placeholder="Description" required></textarea>
                    <button name="add">Add Event</button>
                </form>
            </div>

        </div>
</body>
</html>