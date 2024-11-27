<?php
// Include the database connection
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $username = $_POST['username'];
    $phone_number = $_POST['phone_number'];
    $plan = $_POST['plan'];
    $subjects = isset($_POST['subjects']) ? implode(', ', $_POST['subjects']) : '';
    $school_level = isset($_POST['school_level']) ? $_POST['school_level'] : '';

    // Determine plan name
    $plan_name = '';
    if ($plan == '2') {
        $plan_name = 'Standard';
    } elseif ($plan == '4') {
        $plan_name = 'Pro';
    } elseif ($plan == 'all') {
        $plan_name = 'Premium';
    }

    // Validate inputs
    if (empty($username) || empty($phone_number) || empty($plan) || empty($subjects) || empty($school_level)) {
        echo "All fields are required.";
        exit;
    }

    // Insert data into user_purchases table
    $stmt = $conn->prepare("INSERT INTO user_purchases (username, phone_number, plan, subjects, school_level) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $phone_number, $plan_name, $subjects, $school_level);

    if ($stmt->execute()) {
        echo "success";
        header("Location: payment.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
