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

// Handling comment deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_comment'])) {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        $comment_id = $_POST['comment_id'];

        $sql = "DELETE FROM comments WHERE id = $comment_id";
        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Comment deleted successfully!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error deleting comment: ' . $conn->error . '</div>';
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">You do not have permission to delete this comment.</div>';
    }
}

// Handling comment submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment'])) {
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $comment = $_POST['comment'];
        $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : 'NULL';

        // Insert comment into database
        $sql = "INSERT INTO comments (news_id, username, comment, parent_id) VALUES ($id, '$username', '$comment', $parent_id)";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Comment added successfully!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error adding comment: ' . $conn->error . '</div>';
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">You need to login to comment.</div>';
    }
}

// Fetch comments for this news item
$sql_comments = "SELECT * FROM comments WHERE news_id = $id AND parent_id IS NULL ORDER BY created_at DESC";
$result_comments = $conn->query($sql_comments);
?>

<div class="news-details">
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
        <div class="admin-controls">
            <form method="post" action="delete.php" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="submit" value="Delete" class="button delete-button"
                    onclick="return confirm('Are you sure you want to delete this news?');">
            </form>
            <a href="edit.php?id=<?php echo $row['id']; ?>" class="button edit-button">Edit</a>
        </div>
    <?php endif; ?>
    <br><br>
    <h2><?php echo $row['title']; ?></h2>
</div>
<br><br>
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
<div class="description">
    <p><?php echo $row['description']; ?></p>
</div>

<!-- Form untuk menambahkan komentar -->
<?php if (isset($_SESSION['username'])): ?>
    <form method="post">
        <label for="comment">Add a comment:</label><br>
        <textarea name="comment" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
<?php else: ?>
    <p>You need to <a href="login.php">login</a> to leave a comment.</p>
<?php endif; ?>

<!-- Menampilkan komentar yang sudah ada -->
<h3>Comments:</h3>
<?php while ($comment_row = $result_comments->fetch_assoc()): ?>
    <div class="comment">
        <p><strong><?php echo $comment_row['username']; ?>:</strong> <?php echo $comment_row['comment']; ?></p>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
            <form method="post" style="display:inline;">
                <input type="hidden" name="comment_id" value="<?php echo $comment_row['id']; ?>">
                <input type="submit" name="delete_comment" value="Delete" class="button delete-button"
                    onclick="return confirm('Are you sure you want to delete this comment?');">
            </form>
        <?php endif; ?>
        <br>
        <br>
        <br>
        <!-- Menampilkan balasan komentar -->
        <?php
        $parent_id = $comment_row['id'];
        $sql_replies = "SELECT * FROM comments WHERE parent_id = $parent_id ORDER BY created_at ASC";
        $result_replies = $conn->query($sql_replies);
        ?>
        <?php while ($reply_row = $result_replies->fetch_assoc()): ?>
            <div class="comment reply">
                <p><strong><?php echo $reply_row['username']; ?>:</strong> <?php echo $reply_row['comment']; ?></p>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="comment_id" value="<?php echo $reply_row['id']; ?>">
                        <input type="submit" name="delete_comment" value="Delete" class="button delete-button"
                            onclick="return confirm('Are you sure you want to delete this reply?');">
                    </form>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <br>
        <!-- Form untuk membalas komentar -->
        <?php if (isset($_SESSION['username'])): ?>
            <form method="post">
                <textarea name="comment" rows="2" cols="50" placeholder="Reply to this comment" required></textarea><br>
                <input type="hidden" name="parent_id" value="<?php echo $comment_row['id']; ?>">
                <input type="submit" value="Reply" class="button">
            </form>
        <?php endif; ?>
    </div>
<?php endwhile; ?>

<?php include 'includes/footer.php'; ?>