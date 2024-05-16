<?php
require('../db.php');
session_start();

if (isset($_POST['username'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($conn, $username);

    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE username='$username' AND password='" . md5($password) . "'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $_SESSION['admin'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error = "Username/password is incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="form">
        <h1>Log In</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="" method="post" name="login">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" value="Login" />
        </form>
    
    </div>
</body>
</html>
