<?php
include 'config.php';
$error_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $sql = "SELECT * FROM Admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Redirect to codinator.php if login successful
        header("Location:  ");
        exit; // Ensure that script stops executing after redirection
    } else {
        $error_message = "Invalid username or password."; // Set error message
    }
$conn->close();
}
?>
