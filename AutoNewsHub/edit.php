<?php
include 'includes/db.php';
include 'includes/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM news WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No news found.";
        exit();
    }
} else {
    echo "Invalid ID.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Handle image uploads
    $image1 = $row['image1'];
    $image2 = $row['image2'];
    $image3 = $row['image3'];

    if (!empty($_FILES['image1']['name'])) {
        $image1 = time() . '_' . $_FILES['image1']['name'];
        move_uploaded_file($_FILES['image1']['tmp_name'], "uploads/" . $image1);
    }
    if (!empty($_FILES['image2']['name'])) {
        $image2 = time() . '_' . $_FILES['image2']['name'];
        move_uploaded_file($_FILES['image2']['tmp_name'], "uploads/" . $image2);
    }
    if (!empty($_FILES['image3']['name'])) {
        $image3 = time() . '_' . $_FILES['image3']['name'];
        move_uploaded_file($_FILES['image3']['tmp_name'], "uploads/" . $image3);
    }

    $sql = "UPDATE news SET title = '$title', description = '$description', image1 = '$image1', image2 = '$image2', image3 = '$image3' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">News updated successfully!</div>';
        header('Location: index.php');
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">Error updating news: ' . $conn->error . '</div>';
    }
}
?>

<div class="container">
    <h2>Edit News</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="5" required><?php echo $row['description']; ?></textarea>

        <label for="image1">Image 1:</label>
        <input type="file" id="image1" name="image1">
        <img src="uploads/<?php echo $row['image1']; ?>" alt="Image 1" style="max-width: 100px;">

        <label for="image2">Image 2:</label>
        <input type="file" id="image2" name="image2">
        <img src="uploads/<?php echo $row['image2']; ?>" alt="Image 2" style="max-width: 100px;">

        <label for="image3">Image 3:</label>
        <input type="file" id="image3" name="image3">
        <img src="uploads/<?php echo $row['image3']; ?>" alt="Image 3" style="max-width: 100px;">

        <input type="submit" value="Update">
    </form>
</div>

<?php include 'includes/footer.php'; ?>
