<?php
include 'db_connect.php';
session_start();

// Check if the user is logged in and if they are an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Redirect to the login page if not logged in or not an admin
    header("Location: login.php");
    exit();
}

// Initialize $users to an empty array before fetching the data
$users = [];
$success_message = '';
$error_message = '';

// Fetch all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Store the users' data in an array
    $users = $result->fetch_all(MYSQLI_ASSOC);
}

// Handle form submission for adding a new user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
    // Sanitize and validate the input
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $role = $conn->real_escape_string($_POST['role']);

    // Check if the email already exists in the database
    $email_check = "SELECT * FROM users WHERE email = '$email'";
    $email_result = $conn->query($email_check);

    if ($email_result && $email_result->num_rows > 0) {
        // If the email is taken, set the error message
        $error_message = "Error: The email address is already taken.";
    } else {
        // Insert the new user into the database if the email is unique
        $sql = "INSERT INTO users (first_name, last_name, email, phone_number, password, role) 
                VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$password', '$role')";

        if ($conn->query($sql) === TRUE) {
            // Set the success message if the user is added successfully
            $success_message = "User added successfully!";
        } else {
            // Set the error message if there is a database error
            $error_message = "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script>
        // JavaScript function to toggle the visibility of the "Add New User" form
        function toggleAddUserForm() {
            var form = document.getElementById("addUserForm");
            form.style.display = (form.style.display === "none" || form.style.display === "") ? "block" : "none";
        }
    </script>
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
                <!-- New link for Payment Records -->
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

    <!-- Admin Dashboard Content -->
    <div class="container mt-5">
        <h1 class="display-4 text-center mb-4" style="font-size: 3rem; font-weight: 600; color: #333;">Admin Dashboard</h1>
        <p class="lead text-center">Below is the list of all registered users. You can add, edit, or delete users.</p>

        <!-- Display success or error messages -->
        <?php if ($success_message): ?>
            <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <?php if ($error_message): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <!-- Button to toggle Add User Form -->
        <button class="btn btn-primary mb-4" onclick="toggleAddUserForm()">Add New User</button>

        <!-- Add User Form (Initially Hidden) -->
        <div id="addUserForm" style="display:none; margin-top: 20px;">
            <h3>Add New User</h3>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="add_user">Add User</button>
            </form>
        </div>

        <!-- Users Table -->
        <h3>Manage Users</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($users) > 0): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['user_id']; ?></td>
                            <td><?php echo $user['first_name']; ?></td>
                            <td><?php echo $user['last_name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['phone_number']; ?></td>
                            <td><?php echo $user['role']; ?></td>
                            <td>
                                <a href="user_edit.php?user_id=<?php echo $user['user_id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="user_delete.php?user_id=<?php echo $user['user_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
