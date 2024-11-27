<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Card Information</title>
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
                            <li><a href="choose_plan.php">Choose Subjects</a></li>
                            <li><a href="payment.php">Payment</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Card Information</h2>
                    <p>Please enter your card details to complete the payment.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form id="cardInfoForm">
                        <div class="form-group">
                            <label for="cardHolderName">Cardholder Name:</label>
                            <input type="text" id="cardHolderName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cardNumber">Card Number:</label>
                            <input type="text" id="cardNumber" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cardExpiry">Expiry Date:</label>
                            <input type="text" id="cardExpiry" class="form-control" placeholder="MM/YY" required>
                        </div>
                        <div class="form-group">
                            <label for="cardCVV">CVV:</label>
                            <input type="text" id="cardCVV" class="form-control" required>
                        </div>
                        <p><a href="payment_successful.php" class="btn btn-primary btn-lg">Confirm</a></p>
                        <p><a href="payment.php" class="btn btn-primary btn-lg">Cancel</a></p>
                    </form>                    
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#cardInfoForm').on('submit', function (e) {
                e.preventDefault();
                // Additional validation or processing can be done here
                alert('Payment successful! Your plan is now active.');
                // Redirect to a success page or back to the main site
            });
        });
    </script>
</body>
</html>
