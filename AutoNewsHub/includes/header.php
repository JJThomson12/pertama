<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>AutoNewsHub</title>
</head>

<body>
    <header>
        <div class="container">
            <h1>AutoNewsHub</h1>
            <nav>
                <a href="home.php">Home</a>
                <a href="about.php">About Us</a>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <a href="crud.php">Manage News</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                <?php endif; ?>
            </nav>
            <form action="search.php" method="get" class="search-form">
                <input type="text" name="query" placeholder="Search news..." required>
                <button type="submit">Search</button>
            </form>
        </div>
    </header>
    <div class="container">