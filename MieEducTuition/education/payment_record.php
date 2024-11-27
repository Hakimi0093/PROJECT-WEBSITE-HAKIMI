<?php
include 'db_connect.php';
session_start();

// Check if the user is logged in and if they are an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Redirect to the login page if not logged in or not an admin
    header("Location: login.php");
    exit();
}

// Initialize $payments to an empty array before fetching the data
$payments = [];

// Fetch all payment records from the payments table
$sql = "SELECT * FROM payments";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Store the payment data in an array
    $payments = $result->fetch_all(MYSQLI_ASSOC);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Records</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        /* General Page Styles */
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        h1.display-4 {
            color: #4CAF50;
            font-weight: 700;
        }

        .navbar {
            background-color: #007BFF;
            padding: 1rem;
        }

        .navbar-brand {
            color: white;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .navbar-nav .nav-item .btn {
            color: #fff;
            font-size: 1.1rem;
        }

        .navbar-nav .nav-item .btn:hover {
            color: white;
            background-color: #0056b3;
        }

        /* Table Styles */
        .table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .table th, .table td {
            padding: 12px;
            text-align: left;
            vertical-align: middle;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #007BFF;
            color: white;
            font-size: 1rem;
            font-weight: 600;
        }

        .table td {
            color: #555;
            font-size: 0.9rem;
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .table-striped tbody tr:nth-child(even) {
            background-color: #fff;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .table td, .table th {
            transition: background-color 0.3s ease;
        }

        /* Table Responsiveness */
        .table-responsive {
            overflow-x: auto;
        }

        /* Additional Styles */
        .text-center {
            text-align: center;
        }

        .lead {
            font-size: 1.1rem;
            color: #666;
        }

        /* Button Styles */
        .btn-outline-success {
            border-color: #4CAF50;
            color: #4CAF50;
        }

        .btn-outline-success:hover {
            background-color: #4CAF50;
            color: white;
        }

        .btn-outline-primary {
            border-color: #007BFF;
            color: #007BFF;
        }

        .btn-outline-primary:hover {
            background-color: #007BFF;
            color: white;
        }

        .btn-outline-danger {
            border-color: #dc3545;
            color: #dc3545;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="admin_dashboard.php" style="font-size: 1.8rem; font-weight: 700; color: #4CAF50;">Admin Dashboard</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-outline-success" href="index.php">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary ml-2" href="payment_record.php">
                            <i class="fas fa-credit-card"></i> Payment Records
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-danger ml-2" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Payment Records Content -->
    <div class="container mt-5">
        <h1 class="display-4 text-center mb-4" style="font-size: 3rem; font-weight: 600; color: #333;">Payment Records</h1>
        <p class="lead text-center">Below is the list of all payment records made by users. You can view the payment details here.</p>

        <!-- Payment Records Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Plan</th>
                        <th>Subjects</th>
                        <th>School Level</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Payment Date</th>
                        <th>Subscription ID</th>
                        <th>Transaction ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($payments) > 0): ?>
                        <?php foreach ($payments as $payment): ?>
                            <tr>
                                <td><?php echo $payment['payment_id']; ?></td>
                                <td><?php echo htmlspecialchars($payment['username']); ?></td>
                                <td><?php echo htmlspecialchars($payment['email']); ?></td>
                                <td><?php echo htmlspecialchars($payment['phone_number']); ?></td>
                                <td>
                                    <?php
                                    // Convert plan_id to plan name
                                    $plan_names = [
                                        '1' => 'Standard (2 Subjects)',
                                        '2' => 'Pro (4 Subjects)',
                                        '3' => 'Premium (All Subjects)'
                                    ];
                                    echo isset($plan_names[$payment['plan_id']]) ? $plan_names[$payment['plan_id']] : 'Unknown';
                                    ?>
                                </td>
                                <td><?php echo htmlspecialchars($payment['subjects']); ?></td>
                                <td><?php echo htmlspecialchars($payment['school_level']); ?></td>
                                <td><?php echo htmlspecialchars($payment['payment_method']); ?></td>
                                <td><?php echo 'RM ' . number_format($payment['amount'], 2); ?></td>
                                <td><?php echo htmlspecialchars($payment['payment_status']); ?></td>
                                <td><?php echo htmlspecialchars($payment['payment_date']); ?></td>
                                <td><?php echo htmlspecialchars($payment['subscription_id']); ?></td>
                                <td><?php echo htmlspecialchars($payment['transaction_id']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="13" class="text-center">No payment records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
