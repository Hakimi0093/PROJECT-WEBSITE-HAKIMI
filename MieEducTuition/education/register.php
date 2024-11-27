<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']); // Adding phone number
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (first_name, last_name, email, phone_number, password) 
            VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to login.php
        header("Location: login.php");
        exit(); // Always exit after a header redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MieEducTuition</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f3f4f6;
            background-image: url('https://www.toptal.com/designers/subtlepatterns/patterns/memphis-mini.png'); /* Patterned wallpaper */
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .register-container h3 {
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }
        .register-container .form-group {
            margin-bottom: 15px;
        }
        .register-container .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
            padding: 10px;
        }
        .register-container .btn-primary:hover {
            background-color: #0056b3;
        }
        .text-center a {
            color: #007bff;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h3>Register</h3>

    <!-- Registration Form -->
    <form method="POST" action="">
        <div class="form-group">
            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    
    <div class="text-center mt-3">
        <a href="login.php">Already have an account? Login</a>
    </div>
</div>

<!-- Bootstrap JS and Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
