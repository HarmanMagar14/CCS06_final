<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$user = $result->fetch_assoc();

    if ($user["usertype"] == "admin") {
        header("Location: admin/admin_dashboard.php");

        exit();
    } elseif ($user["usertype"] == "user") {
        header("Location: user/user_dashboard.php"); 
        exit();
    } else {
        echo "Invalid user type.";
    }

// Verify the password
if (password_verify($password, $user['password'])) {
    session_start();
    $_SESSION['username'] = $username;
    header("Location: user_dashboard.php"); // Redirect to the dashboard page
    exit();
} else {
        echo "Invalid password. Please try again.";
    }
} else {
    echo "No user found with that username.";
}
}
?>