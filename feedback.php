<?php
require('db.php');
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: start.php");
    exit();
}

$feedbackSubmitted = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $name = trim($_POST['username']);
    $trade = trim($_POST['trade']);
    $remark = trim($_POST['Remarks']);

    if (!empty($name) && !empty($trade) && !empty($remark)) {
        $name = mysqli_real_escape_string($conn, $name);
        $trade = mysqli_real_escape_string($conn, $trade);
        $remark = mysqli_real_escape_string($conn, $remark);

        $query1 = "INSERT INTO `feedback` (`name`, `trade`, `remark`) VALUES ('$name', '$trade', '$remark')";
        if (mysqli_query($conn, $query1)) {
            $feedbackSubmitted = true;
        } else {
            $error = 'There was an error submitting your feedback.';
        }
    } else {
        $error = 'Please fill out all fields.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="feedbackstyle.css">
    <title>DIARY DISPLAY</title>
    <script>
        function validateForm() {
            var name = document.forms["feedbackForm"]["username"].value;
            var trade = document.forms["feedbackForm"]["trade"].value;
            var remarks = document.forms["feedbackForm"]["Remarks"].value;

            if (name == "" || trade == "" || remarks == "") {
                alert("Please fill out all fields.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="box1">
        <img src="feedback.jpg" class="image">
    </div>
    <div class="box3">
        <p>Please fill the </p><br>
        FEEDBACK FORM<br><br>
        <p>Thank you!</p>
    </div>
    <div class="box2">
        <form name="feedbackForm" method="post" onsubmit="return validateForm()">
            <div class="name">NAME</div><br><br>
            <input type="text" name="username" class="USER1" placeholder="XYZ" required><br><br>
            <div class="name">Trade</div><br><br>
            <input type="text" name="trade" class="USER1" required><br><br><br>
            <div class="name">FEEDBACK</div><br><br>
            <textarea name="Remarks" placeholder="Remarks" required></textarea><br><br>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <?php if ($feedbackSubmitted): ?>
        <script>
            alert('Feedback submitted successfully!');
            window.location = 'feedback.php'; // Redirect after submission
        </script>
    <?php elseif ($error): ?>
        <script>
            alert('<?php echo $error; ?>');
        </script>
    <?php endif; ?>
</body>
</html>
