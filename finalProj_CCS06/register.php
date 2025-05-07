<?php
include "configRegistration.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conPassword = $_POST['conPassword'];

    

    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $checkEmail);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already exists.'); window.location.href='registerForm.php';</script>";
        exit();
    } 


$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (firstname, lastname, username, email, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration successful.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='registerForm.php';</script>";
    }

    mysqli_close($conn);
} else {
    header("Location: registerForm.php");
    exit();
}

?>