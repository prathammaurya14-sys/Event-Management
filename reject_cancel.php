<?php
include("config.php");
include("auth_admin.php");

$id = $_GET['id'];

$conn->query("UPDATE events SET status='approved' WHERE id='$id'");

header("Location: admin_dashboard.php");
exit;
?>