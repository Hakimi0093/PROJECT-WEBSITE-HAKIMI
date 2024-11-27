<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Payment Process</title>
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
                        <div id="fh5co-logo"><a href="index.html">Educ<span>.</span></a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="register.php">Choose Subjects</a></li>
                            <li class="active"><a href="payment.php">Payment</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Payment Process</h2>
                    <p>Complete your payment to access your chosen subjects.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form id="paymentForm">
                        <div class="form-group">
                            <label for="selectedPlan">Selected Plan:</label>
                            <select id="selectedPlan" class="form-control">
                                <option value="">Select Plan</option>
                                <option value="Standard">Standard</option>
                                <option value="Pro">Pro</option>
                                <option value="Premium">Premium</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="planPrice">Plan Price:</label>
                            <input type="text" id="planPrice" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="bankSelect">Choose Your Bank:</label>
                            <select id="bankSelect" class="form-control" required>
                                <option value="">Select Bank</option>
                                <option value="Maybank">Maybank</option>
                                <option value="CIMB">CIMB Bank</option>
                                <option value="PublicBank">Public Bank</option>
                                <option value="RHB">RHB Bank</option>
                                <!-- Add more banks as necessary -->
                            </select>
                        </div>
                        <p><a href="card_information.php" class="btn btn-primary btn-lg">Proceed to Payment</a></p>
                    </form>                    
                </div>
            </div>
        </div>
    </div>

      <script>
    $(document).ready(function () {
        const urlParams = new URLSearchParams(window.location.search);
        const planName = urlParams.get('plan');
        const planPrice = urlParams.get('price');

        // If parameters exist, pre-select in dropdowns
        if (planName && planPrice) {
            $('#selectedPlan').val(planName);
            $('#planPrice').val(planPrice);
        }

        $('#selectedPlan').change(function() {
            // Update price based on plan selection
            switch($(this).val()) {
                case 'Standard':
                    $('#planPrice').val('RM 30.00');
                    break;
                case 'Pro':
                    $('#planPrice').val('RM 54.00');
                    break;
                case 'Premium':
                    $('#planPrice').val('RM 80.00');
                    break;
                default:
                    $('#planPrice').val('');
            }
        });

        $('#paymentForm').on('submit', function (e) {
            e.preventDefault();
            let bank = $('#bankSelect').val();
            if (bank) {
                // Proceed with the payment process using the selected bank
                alert('Payment successful with ' + bank + '. Your access to ' + $('#selectedPlan').val() + ' is now active.');
            } else {
                alert('Please select a bank to proceed with the payment.');
            }
        });
    });
</script>
</body>
</html>
