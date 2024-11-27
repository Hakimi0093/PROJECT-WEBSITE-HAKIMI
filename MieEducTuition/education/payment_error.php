<?php
require_once 'db_connect.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Payment Error</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="page">
        <?php include 'navbar.php'; ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="mb-4">
                                <i class="fas fa-exclamation-circle text-danger" style="font-size: 48px;"></i>
                            </div>
                            <h2 class="text-danger mb-3">Payment Error</h2>

                            <?php if (isset($_GET['error'])): ?>
                                <div class="alert alert-danger">
                                    <?php
                                    $error = urldecode($_GET['error']);
                                    // Provide user-friendly error message
                                    if (strpos($error, 'foreign key constraint fails') !== false) {
                                        echo "There was an error processing your subscription. Please try selecting your subjects and plan again.";
                                    } else {
                                        echo htmlspecialchars($error);
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>

                            <div class="mt-4">
                                <a href="register.php" class="btn btn-primary me-2">Try Again</a>
                                <a href="contact.php" class="btn btn-outline-primary">Contact Support</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/your-kit-code.js" crossorigin="anonymous"></script>
</body>

</html>