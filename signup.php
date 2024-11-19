<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password before saving
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement to insert the new user
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Sign-Up successful! You can now <a href='signin.php'>Sign In</a>";
    } else {
        echo "Error: " . $stmt->error;
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup-signin.css">
</head>
<body>
    <h2>Sign Up</h2>
    <form action="signup.php" method="POST">
        <label>Username:</label><input type="text" name="username" required><br>
        <label>Email:</label><input type="email" name="email" required><br>
        <label>Password:</label><input type="password" name="password" required><br>
        <button type="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href="signin.php">Sign In</a></p>
</body>
</html>
