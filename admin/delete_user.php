<?php
session_start();
if(!isset($_SESSION["admin"])){
    header("Location: index.php");
    exit();
}
require('../db.php');

// Check if username parameter is provided in the URL
if(isset($_GET['username'])) {
    $username = $_GET['username'];

    // Fetch user data to ensure the user exists before attempting to delete
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        // Delete user from the database
        $deleteQuery1 = "DELETE FROM users WHERE username = '$username'";
        $deleteQuery2 = "DELETE FROM user_profile WHERE username = '$username'";
        $deleteQuery3 = "DELETE FROM diary_entry WHERE username = '$username'";

        if(mysqli_query($conn, $deleteQuery1) && mysqli_query($conn, $deleteQuery2) && mysqli_query($conn, $deleteQuery3)) {
            $message = "User deleted successfully.";
        } else {
            $message = "Error deleting user: " . mysqli_error($conn);
        }
    } else {
        $message = "User not found.";
    }
} else {
    $message = "Username parameter is missing.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="delete_user.css">
</head>
<body>
    <div class="container">
        <div class="message"><?php echo $message; ?></div>
        <a href="index.php" class="back-link">Back to Admin Panel</a>
    </div>
</body>
</html>
