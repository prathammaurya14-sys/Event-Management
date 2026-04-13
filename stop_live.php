<?php
include("config.php");
include("auth_admin.php");

$id = $_GET['id'];

$conn->query("UPDATE events SET live_status='no' WHERE id='$id'");

header("Location: manage_events.php");
?>