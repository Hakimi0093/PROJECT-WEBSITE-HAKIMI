<?php
session_start(); // Start the session to access session variables

// Destroy all session data
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session itself

// Redirect to login page after logout
header("Location: login.php");
exit(); // Make sure that code doesn't continue to execute after redirect
