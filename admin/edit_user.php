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

    // Fetch user data based on the provided username
    $query = "SELECT u.username, u.Email, p.Name, p.PhoneNumber, p.DiaryName 
              FROM users u 
              JOIN user_profile p ON u.username = p.username 
              WHERE u.username = '$username'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Handle form submission for updating user data
        if(isset($_POST['submit'])) {
            $newEmail = $_POST['email'];
            $newName = $_POST['name'];
            $newPhoneNumber = $_POST['phone_number'];
            $newDiaryName = $_POST['diary_name'];

            // Update user data in the database
            $updateQuery1 = "UPDATE users SET Email = '$newEmail' WHERE username = '$username'";
            $updateQuery2 = "UPDATE user_profile SET Name = '$newName', PhoneNumber = '$newPhoneNumber', DiaryName = '$newDiaryName' WHERE username = '$username'";

            if(mysqli_query($conn, $updateQuery1) && mysqli_query($conn, $updateQuery2)) {
                $message = "User data updated successfully.";
            } else {
                $message = "Error updating user data: " . mysqli_error($conn);
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="edit_user.css">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <?php if(isset($message)) { echo "<div class='message'>$message</div>"; } ?>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['Name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['Email']; ?>" required>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" value="<?php echo $row['PhoneNumber']; ?>" required>

            <label for="diary_name">Diary Name:</label>
            <input type="text" id="diary_name" name="diary_name" value="<?php echo $row['DiaryName']; ?>">

            <input type="submit" name="submit" value="Update">
        </form>
        <a href="admin_panel.php" class="back-link">Back to Admin Panel</a>
    </div>
</body>
</html>
<?php
    } else {
        echo "<div class='container'><div class='message error'>User not found.</div><a href='admin_panel.php' class='back-link'>Back to Admin Panel</a></div>";
    }
} else {
    echo "<div class='container'><div class='message error'>Username parameter is missing.</div><a href='admin_panel.php' class='back-link'>Back to Admin Panel</a></div>";
}
?>
