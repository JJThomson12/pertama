<?php
include 'includes/db.php';
include 'includes/header.php';

$sql = "SELECT * FROM news ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<h2>Latest News</h2>
<?php while($row = $result->fetch_assoc()): ?>
    <div class="news-item">
        <div class="slideshow-container">
            <div class="mySlides-<?php echo $row['id']; ?> fade">
                <img src="uploads/<?php echo $row['image1']; ?>" style="width:100%">
            </div>
            <div class="mySlides-<?php echo $row['id']; ?> fade">
                <img src="uploads/<?php echo $row['image2']; ?>" style="width:100%">
            </div>
            <div class="mySlides-<?php echo $row['id']; ?> fade">
                <img src="uploads/<?php echo $row['image3']; ?>" style="width:100%">
            </div>
        </div>
        <h2><?php echo $row['title']; ?></h2>
        <p><?php echo substr($row['description'], 0, 100); ?>...</p>
        <a href="detail.php?id=<?php echo $row['id']; ?>">Read more</a>
    </div>
<?php endwhile; ?>

<?php include 'includes/footer.php'; ?>
