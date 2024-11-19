<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travelscapes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <nav>
            <span>
                <img src="images/finalimage.png" width="220">
            </span>
            <div class="header">
                <ul>
                    <li><a href="aboutus.html">About</a></li>
                    <li><a href="help.html">Help</a></li>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo '<li><a href="logout.php">Sign Out</a></li>';
                        echo '<li>Welcome, ' . htmlspecialchars($_SESSION['username']) . '!</li>';
                    } else {
                        echo '<li><a href="signup.php">Sign Up</a></li>';
                        echo '<li><a href="signin.php">Sign In</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <div class="content">
            <h1>Welcome to Travelscapes!</h1>
            <p>Explore the hidden gems of India with us!</p>
        </div>
        <div class="places">
            <div class="place">
                <img src="images/place1.jpeg" alt="Rajasthan" width="200">
                <p>Experience the magic of Rajasthan – a land where tradition meets adventure.</p>
                <a href="rajasthan.html">Discover the Gems of Rajasthan</a>
            </div>
            <div class="place">
                <img src="images/place2.jpeg" alt="Kashmir" width="200">
                <p>Where every view is a masterpiece – Discover Kashmir.</p>
                <a href="kashmir.html">Discover the Gems of Kashmir</a>
            </div>
            <!-- Add other places similarly -->
        </div>
    </div>
</body>
</html>
