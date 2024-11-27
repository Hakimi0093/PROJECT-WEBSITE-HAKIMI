<?php
// Include the database connection file
include('db_connect.php');

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $plan = mysqli_real_escape_string($conn, $_POST['plan']);
    $subjects = mysqli_real_escape_string($conn, implode(', ', $_POST['subjects']));
    $school_level = mysqli_real_escape_string($conn, implode(', ', $_POST['school_level']));
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);

    // Generate random transaction ID and subscription ID
    $transaction_id = strtoupper(bin2hex(random_bytes(8)));  // 16 characters
    $subscription_id = strtoupper(uniqid('SUB-', true));     // Prefix 'SUB-'

    // Determine price based on the selected plan
    $planPrices = [
        '1' => 30.00,  // Standard plan price
        '2' => 54.00,  // Pro plan price
        '3' => 80.00   // Premium plan price
    ];

    $amount = isset($planPrices[$plan]) ? $planPrices[$plan] : 0.00;

    // Prepare the SQL query to insert the data into the payments table
    $sql = "INSERT INTO payments (username, email, phone_number, plan_id, subjects, school_level, payment_method, amount, payment_status, transaction_id, subscription_id)
            VALUES ('$username', '$email', '$phone_number', '$plan', '$subjects', '$school_level', '$payment_method', '$amount', 'pending', '$transaction_id', '$subscription_id')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Successfully inserted data
        $payment_id = mysqli_insert_id($conn); // Get the inserted payment ID (if needed for debugging)

        // Redirect to payment_success.php with transaction_id or subscription_id in the URL
        header("Location: payment_success.php?transaction_id=$transaction_id");
        exit(); // Make sure to call exit after header to prevent further script execution
    } else {
        // Error in inserting data
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Choose Subjects</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
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
                    <h2>Choose Subjects</h2>
                    <p>Select the subjects you'd like to include in your plan.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form id="subjectForm" method="POST">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone Number:</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                        </div>

                        <div class="form-group">
                            <label for="planSelect">Choose your plan:</label>
                            <select id="planSelect" name="plan" class="form-control" required>
                                <option value="">Select Plan</option>
                                <option value="1">Standard (2 Subjects)</option>
                                <option value="2">Pro (4 Subjects)</option>
                                <option value="3">Premium (All Subjects)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Select Subjects:</label><br>
                            <div class="checkbox">
                                <label><input type="checkbox" class="subject-checkbox" value="Bahasa Melayu" name="subjects[]"> Bahasa Melayu</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" class="subject-checkbox" value="Bahasa Inggeris" name="subjects[]"> Bahasa Inggeris</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" class="subject-checkbox" value="Matematik" name="subjects[]"> Matematik</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" class="subject-checkbox" value="Sains" name="subjects[]"> Sains</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" class="subject-checkbox" value="Sejarah" name="subjects[]"> Sejarah</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" class="subject-checkbox" value="Pendidikan Islam" name="subjects[]"> Pendidikan Islam</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Select Your School Level:</label><br>
                            <div>
                                <label>Primary School:</label><br>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="age-checkbox" value="Grade 1" name="school_level[]"> Grade 1</label>
                                    <label><input type="checkbox" class="age-checkbox" value="Grade 2" name="school_level[]"> Grade 2</label>
                                    <label><input type="checkbox" class="age-checkbox" value="Grade 3" name="school_level[]"> Grade 3</label>
                                    <label><input type="checkbox" class="age-checkbox" value="Grade 4" name="school_level[]"> Grade 4</label>
                                    <label><input type="checkbox" class="age-checkbox" value="Grade 5" name="school_level[]"> Grade 5</label>
                                    <label><input type="checkbox" class="age-checkbox" value="Grade 6" name="school_level[]"> Grade 6</label>
                                </div>
                            </div>
                            <br>
                            <div>
                                <label>Secondary School:</label><br>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="age-checkbox" value="Form 1" name="school_level[]"> Form 1</label>
                                    <label><input type="checkbox" class="age-checkbox" value="Form 2" name="school_level[]"> Form 2</label>
                                    <label><input type="checkbox" class="age-checkbox" value="Form 3" name="school_level[]"> Form 3</label>
                                    <label><input type="checkbox" class="age-checkbox" value="Form 4" name="school_level[]"> Form 4</label>
                                    <label><input type="checkbox" class="age-checkbox" value="Form 5" name="school_level[]"> Form 5</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Payment Method:</label>
                            <select name="payment_method" class="form-control" required>
                                <option value="">Select Payment Method</option>
                                <option value="credit_card">Credit Card</option>
                                <option value="online_banking">Online Banking</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div id="planPrice"></div>
                        </div>

                        <p><button type="submit" class="btn btn-primary btn-lg">Proceed to Payment</button></p>
                    </form>

                    <!-- Message -->
                    <?php if (isset($message)): ?>
                        <div class="alert alert-info"><?php echo $message; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let subjectLimit = 0;
            let planPrices = {
                '1': 30.00, // tandard plan price
                '2': 54.00, // Pro plan price
                '3': 80.00 // Premium plan price
            };

            $('#planSelect').on('change', function() {
                const plan = $(this).val();
                // Update subject limits based on plan
                switch (plan) {
                    case '1': // standard
                        subjectLimit = 2;
                        break;
                    case '2': // pro
                        subjectLimit = 4;
                        break;
                    case '3': // Premium
                        subjectLimit = $('.subject-checkbox').length;
                        break;
                    default:
                        subjectLimit = 0;
                }

                $('.subject-checkbox').prop('checked', false);
                updateSubjectSelection();

                // Update price display
                if (plan && planPrices[plan]) {
                    $('#planPrice').html('<label>Amount to Pay: RM' + planPrices[plan].toFixed(2) + '</label>');
                } else {
                    $('#planPrice').html('');
                }
            });

            $('.subject-checkbox').on('change', function() {
                updateSubjectSelection();
            });

            $('.age-checkbox').on('change', function() {
                if ($(this).is(':checked')) {
                    $('.age-checkbox').not(this).prop('checked', false);
                }
            });

            function updateSubjectSelection() {
                const selectedSubjects = $('.subject-checkbox:checked').length;
                $('.subject-checkbox').each(function() {
                    if (selectedSubjects >= subjectLimit && !$(this).is(':checked')) {
                        $(this).prop('disabled', true);
                    } else {
                        $(this).prop('disabled', false);
                    }
                });
            }
        });
    </script>
</body>

</html>
