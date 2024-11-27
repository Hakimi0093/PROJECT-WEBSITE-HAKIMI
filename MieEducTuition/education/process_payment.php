<?php
require_once 'db_connect.php';

try {
    // Start transaction
    $conn->begin_transaction();

    // Get POST data
    $subscription_id = $_POST['subscription_id'];
    $payment_method = $_POST['payment_method'];
    $plan_id = $_POST['plan_id'];

    // Get plan price
    $stmt = $conn->prepare("SELECT price FROM plans WHERE plan_id = ?");
    $stmt->bind_param("i", $plan_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $plan = $result->fetch_assoc();

    if (!$plan) {
        throw new Exception("Invalid plan selected");
    }

    // Generate transaction ID
    $transaction_id = uniqid('TRX');

    // Create payment record
    $stmt = $conn->prepare("INSERT INTO payments (subscription_id, amount, payment_method, transaction_id, status, payment_date) 
                           VALUES (?, ?, ?, ?, 'completed', NOW())");
    $stmt->bind_param("idss", $subscription_id, $plan['price'], $payment_method, $transaction_id);

    if (!$stmt->execute()) {
        throw new Exception("Error creating payment record");
    }

    // Update subscription status
    $stmt = $conn->prepare("UPDATE subscriptions SET status = 'active', payment_status = 'paid' WHERE subscription_id = ?");
    $stmt->bind_param("i", $subscription_id);

    if (!$stmt->execute()) {
        throw new Exception("Error updating subscription");
    }

    // Commit transaction
    $conn->commit();

    // Redirect to success page
    header('Location: payment_success.php?transaction_id=' . $transaction_id);
    exit();
} catch (Exception $e) {
    $conn->rollback();
    header('Location: payment_error.php?error=' . urlencode($e->getMessage()));
    exit();
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
    $conn->close();
}
