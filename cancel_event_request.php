<?php
include("config.php");
include("auth_user.php");

if(!isset($_GET['id'])){
header("Location: user_dashboard.php");
exit;
}

$id = $_GET['id'];
$user = $_SESSION['username'];

/* Verify event belongs to user */
$check = $conn->query("SELECT * FROM events WHERE id='$id' AND user_name='$user'");

if($check->num_rows == 1){

$conn->query("UPDATE events SET status='cancel_pending' WHERE id='$id'");

}

header("Location: user_dashboard.php");
exit;
?>