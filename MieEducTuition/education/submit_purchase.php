<?php
require_once 'db_connect.php';

try {
    $conn->begin_transaction();

    // Insert into users table first
    $stmt = $conn->prepare("INSERT INTO users (first_name, email, phone_number, role, created_at) 
                           VALUES (?, ?, ?, 'student', NOW())");
    $stmt->bind_param("sss", $_POST['username'], $_POST['email'], $_POST['phone_number']);
    $stmt->execute();
    $user_id = $conn->insert_id;

    // Get plan details
    $stmt = $conn->prepare("SELECT plan_id, price FROM plans WHERE plan_id = ?");
    $stmt->bind_param("i", $_POST['plan']);
    $stmt->execute();
    $result = $stmt->get_result();
    $plan = $result->fetch_assoc();

    if (!$plan) {
        throw new Exception("Invalid plan selected");
    }

    // Create subscription
    $stmt = $conn->prepare("INSERT INTO subscriptions (user_id, plan_id, start_date, status, payment_status, created_at) 
                           VALUES (?, ?, NOW(), 'pending', 'unpaid', NOW())");
    $stmt->bind_param("ii", $user_id, $plan['plan_id']);
    $stmt->execute();
    $subscription_id = $conn->insert_id;

    // Insert selected subjects
    $subjects = explode(', ', $_POST['subjects']);
    foreach ($subjects as $subject_name) {
        // Get subject_id
        $stmt = $conn->prepare("SELECT subject_id FROM subjects WHERE subject_name = ?");
        $stmt->bind_param("s", $subject_name);
        $stmt->execute();
        $result = $stmt->get_result();
        $subject = $result->fetch_assoc();

        if ($subject) {
            $stmt = $conn->prepare("INSERT INTO student_subjects (user_id, subject_id, subscription_id, status, created_at) 
                                  VALUES (?, ?, ?, 'pending', NOW())");
            $stmt->bind_param("iii", $user_id, $subject['subject_id'], $subscription_id);
            $stmt->execute();
        }
    }

    $conn->commit();

    // Return success response with subscription_id
    echo json_encode([
        'success' => true,
        'subscription_id' => $subscription_id,
        'amount' => $plan['price']
    ]);
} catch (Exception $e) {
    $conn->rollback();
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
    $conn->close();
}
