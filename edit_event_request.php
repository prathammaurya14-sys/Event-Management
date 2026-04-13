<?php
include("config.php");

$id=$_GET['id'];

if(isset($_POST['update'])){

$name=$_POST['name'];
$date=$_POST['date'];
$loc=$_POST['location'];

$conn->query("UPDATE events
SET event_name='$name',
event_date='$date',
event_location='$loc',
status='pending'
WHERE id='$id'");

echo "Edit request sent to admin.";
}

$data=$conn->query("SELECT * FROM events WHERE id='$id'");
$row=$data->fetch_assoc();
?>

<form method="POST">

<input type="text" name="name" value="<?php echo $row['event_name']; ?>">

<input type="date" name="date" value="<?php echo $row['event_date']; ?>">

<input type="text" name="location" value="<?php echo $row['event_location']; ?>">

<button name="update">Update Event</button>

</form>