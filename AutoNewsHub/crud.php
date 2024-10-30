<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: home.php');
    exit();
}

include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];

    move_uploaded_file($_FILES['image1']['tmp_name'], "uploads/$image1");
    move_uploaded_file($_FILES['image2']['tmp_name'], "uploads/$image2");
    move_uploaded_file($_FILES['image3']['tmp_name'], "uploads/$image3");

    $sql = "INSERT INTO news (title, description, image1, image2, image3) VALUES ('$title', '$description', '$image1', '$image2', '$image3')";
    $conn->query($sql);
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
        </div>
    </header>
    <div class="container">
        <h2>Manage News</h2>
        <form method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            <br>
            <label for="image1">Image 1:</label>
            <input type="file" id="image1" name="image1" required>
            <br>
            <label for="image2">Image 2:</label>
            <input type="file" id="image2" name="image2">
            <br>
            <label for="image3">Image 3:</label>
            <input type="file" id="image3" name="image3">
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>