<?php
include("config.php");

$message="";

if(isset($_POST['register'])){

$username = trim($_POST['username']);
$password = md5($_POST['password']);

# Check if username already exists
$stmt = $conn->prepare("SELECT id FROM users WHERE username=?");
$stmt->bind_param("s",$username);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){

$message="Username already exists";

}else{

$insert = $conn->prepare("INSERT INTO users(username,password) VALUES(?,?)");
$insert->bind_param("ss",$username,$password);
$insert->execute();

$message="Registration successful. Please login.";

}

}
?>

<!DOCTYPE html>
<html>

<head>
<title>Register</title>
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

<h2>Register</h2>

<?php if($message!=""){ ?>
<p><?php echo $message; ?></p>
<?php } ?>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" id="password" name="password" placeholder="Password" class="password-box" required>

<span onclick="togglePassword()">👁</span>

<button type="submit" name="register">Register</button>

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
<p>© <?php echo date("Y"); ?> Event Management System</p>
</footer>

</body>
</html>