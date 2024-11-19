<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement to fetch the user details
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username, $hashed_password);
    $stmt->fetch();

    // If user exists and password is correct, start session and redirect to homepage
    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['username'] = $username;
        
        // Redirect to the main HTML page
        header("Location: website.html");  // Use relative path, no need for full local path
        exit();  // Make sure no further code is executed after the redirection
    } else {
        echo "Incorrect email or password.";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="signup-signin.css">
</head>
<body>
    <h2>Sign In</h2>
    <form action="signin.php" method="POST">
        <label>Email:</label><input type="email" name="email" required><br>
        <label>Password:</label><input type="password" name="password" required><br>
        <button type="submit">Sign In</button>
    </form>
</body>
</html>
