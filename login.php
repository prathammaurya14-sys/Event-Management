<?php
include("config.php");

$message = "";

if(isset($_POST['login'])){

    $username = trim($_POST['username']);
    $password = md5($_POST['password']);

    // 1. Check admin
    $admin = $conn->query("SELECT * FROM admins 
                           WHERE username='$username' AND password='$password'");

    if($admin->num_rows == 1){

        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit;

    }

    // 2. Check user
    $user = $conn->query("SELECT * FROM users 
                          WHERE username='$username' AND password='$password'");

    if($user->num_rows == 1){

        $_SESSION['username'] = $username;
        header("Location: user_dashboard.php");
        exit;

    }

    $message = "Invalid login credentials.";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
<h2>Event Management System</h2>
</header>

<div class="content" style="max-width:400px;margin:auto;margin-top:100px;">

<div class="back-btn">
<button onclick="history.back()">← Back</button>
</div>

<h2>Login</h2>

<?php if($message) echo "<p>$message</p>"; ?>

<form method="POST">

<input type="text" name="username" placeholder="Username" class="input-box" required>

<input type="password" id="password" name="password" placeholder="Password" required>

<span onclick="togglePassword()">👁</span>

<button type="submit" name="login">Login</button>

</form>

</div>
<script>
function togglePassword(){
var x = document.getElementById("password");

if(x.type === "password"){
x.type = "text";
}else{
x.type = "password";
}
}
</script>
<footer>
© <?php echo date("Y"); ?> Event Management System | All Rights Reserved
</footer>

</body>
</html>