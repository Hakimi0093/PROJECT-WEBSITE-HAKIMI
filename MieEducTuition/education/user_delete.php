<?php
include 'db_connect.php';
session_start();

// Check if the user is logged in and if they are an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Redirect to the login page if not logged in or not an admin
    header("Location: login.php");
    exit();
}

// Check if the user_id is set in the query string
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Start a transaction to ensure data integrity
    $conn->begin_transaction();

    try {
        // Step 1: Delete payments related to the user's subscriptions
        $deletePayments = "DELETE FROM payments WHERE subscription_id IN (SELECT subscription_id FROM subscriptions WHERE user_id = '$user_id')";
        $conn->query($deletePayments);

        // Step 2: Delete the subscriptions related to the user
        $deleteSubscriptions = "DELETE FROM subscriptions WHERE user_id = '$user_id'";
        $conn->query($deleteSubscriptions);

        // Step 3: Delete the user from the users table
        $deleteUser = "DELETE FROM users WHERE user_id = '$user_id'";
        $conn->query($deleteUser);

        // Commit the transaction
        $conn->commit();

        // Redirect back to the dashboard with a success message
        header("Location: admin_dashboard.php?success=User and associated subscriptions and payments deleted successfully!");
        exit();
    } catch (mysqli_sql_exception $e) {
        // If an error occurs, roll back the transaction
        $conn->rollback();
        // Redirect back to the dashboard with an error message
        header("Location: admin_dashboard.php?error=Error deleting user, subscriptions, and payments: " . $e->getMessage());
        exit();
    }
} else {
    // Redirect to the dashboard if no user_id is provided
    header("Location: admin_dashboard.php");
    exit();
}

$conn->close();
?>
