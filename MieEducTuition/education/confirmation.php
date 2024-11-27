<?php
session_start();

if (!isset($_GET['plan'])) {
    header("Location: choose_plan.php");
    exit;
}

$planName = htmlspecialchars($_GET['plan']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Purchase Confirmation</title>
</head>
<body>
    <h2>Thank you for your purchase!</h2>
    <p>You have successfully purchased the <strong><?php echo $planName; ?></strong> plan.</p>
    <a href="dashboard.php">Go to Dashboard</a>
</body>
</html>
