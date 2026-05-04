<?php
session_start();
require_once "includes/validation.php";

$username = $_POST['username'] ?? "";
$email = $_POST['email'] ?? "";
$password = $_POST['password'] ?? "";
$remember = isset($_POST['remember']);

$userError = validateUsername($username);
$emailError = validateEmail($email);
$passError = validatePassword($password);

if ($userError || $emailError || $passError) {
    $_SESSION['error'] = $userError . " " . $emailError . " " . $passError;
    header("Location: login.php");
    exit();
}

if (
    ($username === "user1" && $email === "user1@example.com" && $password === "User@01") ||
    ($username === "user2" && $email === "user2@example.com" && $password === "User@02") ||
    ($username === "admin" && $email === "admin@example.com" && $password === "Admin@123")
) {

    if ($username === "user1") {
        $theme = "dark";
        $user_id = 1;
    } elseif ($username === "user2") {
        $theme = "warm";
        $user_id = 2;
    } else {
        $theme = "light";
        $user_id = 101;
    }

    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['theme'] = $theme;

    if ($remember) {
        setcookie("remember_username", $username, time() + 60);
        setcookie("user_theme", $theme, time() + 60);
    } else {
        setcookie("remember_username", "", time() - 3600);
        setcookie("user_theme", $theme, time() + 60);
    }

    header("Location: dashboard.php");
    exit();

} else {
    $_SESSION['error'] = "Invalid credentials";
    header("Location: login.php");
    exit();
}