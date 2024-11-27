<?php
// Include the database connection file
include('db_connect.php');

// Check if transaction_id or subscription_id is passed in the URL
if (isset($_GET['transaction_id']) || isset($_GET['subscription_id'])) {
    // Use either transaction_id or subscription_id from the URL
    $transaction_id = isset($_GET['transaction_id']) ? $_GET['transaction_id'] : null;
    $subscription_id = isset($_GET['subscription_id']) ? $_GET['subscription_id'] : null;

    // Build the SQL query based on which ID is available
    if ($transaction_id) {
        $sql = "SELECT * FROM payments WHERE transaction_id = '$transaction_id' LIMIT 1";
    } elseif ($subscription_id) {
        $sql = "SELECT * FROM payments WHERE subscription_id = '$subscription_id' LIMIT 1";
    }

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Fetch the payment data if available
    if ($result && mysqli_num_rows($result) > 0) {
        $payment = mysqli_fetch_assoc($result);
    } else {
        // If no data found, redirect to home
        header('Location: index.php');
        exit();
    }
} else {
    // If no transaction_id or subscription_id is passed, redirect to home
    header('Location: index.php');
    exit();
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Payment Success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Custom CSS -->
    <style>
        /* General page styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Container for the page */
        #page {
            padding-top: 50px;
        }

        /* Navigation bar */
        .fh5co-nav {
            background-color: #2d3e50;
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }

        .fh5co-logo a {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .menu-1 ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: right;
        }

        .menu-1 li {
            display: inline-block;
            margin: 0 10px;
        }

        .menu-1 a {
            color: #fff;
            font-size: 16px;
            text-decoration: none;
        }

        .menu-1 a:hover {
            color: #00bcd4;
        }

        /* Heading styling */
        .fh5co-heading h2 {
            font-size: 36px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .fh5co-heading p {
            font-size: 18px;
            color: #666;
        }

        /* Main content styling */
        .container {
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-width: 800px;
            margin: 20px auto;
        }

        /* Payment receipt styling */
        .payment-details {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .payment-details h4 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .payment-details p {
            font-size: 16px;
            margin: 8px 0;
        }

        .payment-details p strong {
            color: #333;
            font-weight: bold;
        }

        /* Button styling */
        .btn-home {
            background-color: #2d3e50;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-home:hover {
            background-color: #00bcd4;
            color: #fff;
        }

        /* Styling for the footer */
        footer {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            background-color: #2d3e50;
            color: #fff;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div id="page">
        <nav class="fh5co-nav" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="fh5co-logo"><a href="index.php">Educ<span>.</span></a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li class="active"><a href="choose_plan.php">Choose Subjects</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Payment Successful</h2>
                    <p>Thank you for your purchase. Here are your payment details:</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="payment-details">
                        <h4>Receipt</h4>
                        <p><strong>Username:</strong> <?php echo htmlspecialchars($payment['username']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($payment['email']); ?></p>
                        <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($payment['phone_number']); ?></p>
                        <p><strong>Plan:</strong> 
                            <?php
                                // Convert plan ID to plan name
                                $plan_names = [
                                    '1' => 'Standard (2 Subjects)',
                                    '2' => 'Pro (4 Subjects)',
                                    '3' => 'Premium (All Subjects)'
                                ];
                                echo isset($plan_names[$payment['plan_id']]) ? $plan_names[$payment['plan_id']] : 'Unknown';
                            ?>
                        </p>
                        <p><strong>Subjects:</strong> <?php echo htmlspecialchars($payment['subjects']); ?></p>
                        <p><strong>School Level:</strong> <?php echo htmlspecialchars($payment['school_level']); ?></p>
                        <p><strong>Payment Method:</strong> <?php echo htmlspecialchars($payment['payment_method']); ?></p>
                        <p><strong>Amount Paid:</strong> RM <?php echo number_format($payment['amount'], 2); ?></p>
                    </div>
                </div>
            </div>

            <!-- Button to navigate back to the home page -->
            <div class="text-center">
                <a href="index.php" class="btn-home">Back to Home</a>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
