<?php
session_start();
if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit(); 
}
require('../db.php');

// Fetch user data
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

// Display user data in a table
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin_panel.css">
</head>
<body>
    <div class="container">
        <h1>User Data</h1>
        <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td>
                    <a href="edit_user.php?username=<?php echo $row['username']; ?>">Edit</a>
                    <a href="delete_user.php?username=<?php echo $row['username']; ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <a class="logout" href="logout.php">Logout</a>
    </div>
</body>
</html>
