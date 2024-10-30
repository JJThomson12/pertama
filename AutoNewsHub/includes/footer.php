<footer>
    <div class="container">
        <p>&copy; 2024 AutoNewsHub. All rights reserved.</p>
    </div>
</footer>
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
    let slides = document.getElementsByClassName("mySlides");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    slides[slideIndex-1].style.display = "block";  
    setTimeout(showSlides, 5000); // Change image every 5 seconds
}
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    let slideIndex = {};

    <?php
    // Fetch all news IDs to create unique slideshows for each news item
    $newsIds = [];
    $sql = "SELECT id FROM news";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $newsIds[] = $row['id'];
    }
    ?>

    // Initialize slide indexes for each news item
    <?php foreach ($newsIds as $newsId): ?>
        slideIndex[<?php echo $newsId; ?>] = 0;
        showSlides(<?php echo $newsId; ?>);
    <?php endforeach; ?>

    function showSlides(newsId) {
        let slides = document.getElementsByClassName("mySlides-" + newsId);
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex[newsId]++;
        if (slideIndex[newsId] > slides.length) {slideIndex[newsId] = 1}    
        slides[slideIndex[newsId]-1].style.display = "block";  
        setTimeout(function() { showSlides(newsId); }, 5000); // Change image every 5 seconds
    }
});
</script>

</body>
</html>
