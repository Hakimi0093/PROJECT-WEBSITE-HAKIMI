<?php
include 'db_connect.php';
session_start();

// Check if the user is logged in and if they are an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Check if 'user_id' is provided in the URL
if (isset($_GET['user_id'])) {
    $user_id = $conn->real_escape_string($_GET['user_id']);

    // Retrieve the user's current data
    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    } else {
        // If user is not found, redirect to the dashboard or show an error message
        header("Location: admin_dashboard.php");
        exit();
    }
}

// Handle the form submission for editing the user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $role = $conn->real_escape_string($_POST['role']);
    
    // Handle password change
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the new password and confirm password match
    if (!empty($password) || !empty($confirm_password)) {
        if ($password !== $confirm_password) {
            $error_message = "Passwords do not match!";
        } else {
            // Hash the new password if they match
            $password = password_hash($password, PASSWORD_DEFAULT);
            // Update the user password and other details
            $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', phone_number='$phone_number', role='$role', password='$password' WHERE user_id='$user_id'";
        }
    } else {
        // If no password is entered, just update other user details
        $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', phone_number='$phone_number', role='$role' WHERE user_id='$user_id'";
    }

    // Execute the SQL query
    if (isset($sql) && $conn->query($sql) === TRUE) {
        $success_message = "User updated successfully!";
        // Redirect to admin_dashboard.php after successful update
        header("Location: admin_dashboard.php");
        exit(); // Make sure to call exit to stop further code execution
    } else {
        $error_message = "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <!-- Admin Dashboard Content -->
    <div class="container mt-5">
        <h1>Edit User</h1>

        <?php if (isset($success_message)) echo "<div class='alert alert-success'>$success_message</div>"; ?>
        <?php if (isset($error_message)) echo "<div class='alert alert-danger'>$error_message</div>"; ?>

        <!-- Edit User Form -->
        <form method="POST" action="">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo $user['first_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo $user['last_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" value="<?php echo $user['phone_number']; ?>" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" class="form-control">
                    <option value="admin" <?php echo $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                    <option value="teacher" <?php echo $user['role'] == 'teacher' ? 'selected' : ''; ?>>Teacher</option>
                    <option value="student" <?php echo $user['role'] == 'student' ? 'selected' : ''; ?>>Student</option>
                </select>
            </div>

            <!-- Password and Confirm Password Fields -->
            <div class="form-group">
                <label for="password">New Password (Leave blank if not changing)</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" class="form-control" name="confirm_password">
            </div>

            <button type="submit" class="btn btn-primary" name="edit_user">Update User</button>
        </form>

        <a href="admin_dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
