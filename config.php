<?php
session_start();

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$conn = new mysqli("localhost","root","","event_management");

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

?>