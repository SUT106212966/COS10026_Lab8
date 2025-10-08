<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if($username === 'Wong Joe Yee' && $password === '106212966') {
    $_SESSION['user'] = $username;
    header('Location: welcome.php');
} else {
   echo "Invalid login. <a href='login.php'>Try again</a>.";
}
?>