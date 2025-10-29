<?php
session_start();
include('settings.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$new_email = $_POST['email'];

$sql = "UPDATE `user` SET email=? WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $new_email, $username);

if ($stmt->execute()) {
    header("Location: profile.php");
    exit();
} else {
    echo "Error updating email: " . $conn->error;
}
?>
