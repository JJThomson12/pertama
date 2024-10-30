<?php
include 'includes/db.php';
include 'includes/header.php';

if (isset($_GET['query'])) {
    $query = $conn->real_escape_string($_GET['query']);
    $sql = "SELECT * FROM news WHERE title LIKE '%$query%' OR description LIKE '%$query%'";
    $result = $conn->query($sql);
} else {
    echo "No search query provided.";
    exit();
}
?>

<h2>Search Results for "<?php echo htmlspecialchars($query); ?>"</h2>
<?php if ($result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="news-item">
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="uploads/<?php echo $row['image1']; ?>" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <img src="uploads/<?php echo $row['image2']; ?>" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <img src="uploads/<?php echo $row['image3']; ?>" style="width:100%">
                </div>
            </div>
            <h2><?php echo $row['title']; ?></h2>
            <p><?php echo substr($row['description'], 0, 100); ?>...</p>
            <a href="detail.php?id=<?php echo $row['id']; ?>">Read more</a>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>No results found for "<?php echo htmlspecialchars($query); ?>"</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
