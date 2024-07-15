<?php
session_start();
include("connection.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check in member table
    $sql_member = "SELECT * FROM member WHERE username = ? AND password = ?";
    $stmt_member = $conn->prepare($sql_member);
    $stmt_member->bind_param("ss", $username, $password);
    $stmt_member->execute();
    $result_member = $stmt_member->get_result();

    // Check in admin table
    $sql_admin = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bind_param("ss", $username, $password);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    // Check if user is found in member table
    if ($result_member->num_rows == 1) {
        $_SESSION['username'] = $username;

        $row = $result_member->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];

        header("Location: index.php");
        exit();
    } elseif ($result_admin->num_rows == 1) {
        // Check if user is found in admin table
        $_SESSION['username'] = $username;

        header("Location: admincod.php");
        exit();
    } else {
        // If user is not found in both tables
        $error_message = "Invalid username and password!!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./login.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form id="loginForm" method="post" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Login">
            <label>
                <input type="checkbox" id="rememberMe"> Remember me
            </label>
            <a href="#" id="forgotPassword">Forgot password?</a>
        </form>
        <div class="error-message" id="errorMessage"><?php if (isset($error_message)) echo $error_message; ?></div>
        <a href="https://anmi.in/member-register">Don't have an account? Register</a>
    </div>
</body>
</html>
