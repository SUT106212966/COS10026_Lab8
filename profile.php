<?php
session_start();
include('settings.php');

// Check login session
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM user WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Profile</title>
</head>
<body>
  <h2>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h2>

  <h3>Current Details</h3>
  <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
  <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>

  <h3>Edit Profile</h3>
  <form method="POST" action="update_profile.php">
    <label>New Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
    <input type="submit" value="Update">
  </form>

</body>
</html>
