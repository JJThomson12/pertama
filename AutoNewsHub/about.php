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
        <div class="about">
            <h1>About Us</h1>

            <div class="section">
                <h2>The AutoNewsHub Team</h2>
                <p>Welcome to AutoNewsHub, your number one source for all things automotive. We're dedicated to giving
                    you
                    the
                    very best of car news, with a focus on reliability, up-to-date information, and comprehensive
                    coverage.
                </p>
                <p>Founded in 2024, AutoNewsHub has come a long way from its beginnings. When we first started out, our
                    passion
                    for cars drove us to start this website, so that AutoNewsHub can offer you the best and latest news
                    in
                    the
                    automotive world. We now serve readers all over the world, and are thrilled that we're able to turn
                    our
                    passion into our own website.</p>
                <p>We hope you enjoy our news as much as we enjoy offering them to you. If you have any questions or
                    comments,
                    please don't hesitate to contact us.</p>
                <p>Sincerely,</p>
            </div>

            <div class="section">
                <h2>Meet the Developer</h2>
                <div class="developer-info">
                    <img src="11.jpg" alt="Profile Picture" width="100" height="100"
                        style="border-radius: 50%; margin-right: 20px;">
                    <div class="developer-bio">
                        <h3>Jovi Rizal</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam volutpat ultrices justo, at
                            fermentum elit tempus non. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                            posuere
                            cubilia curae; Quisque ullamcorper augue et lacus tristique, ac fermentum justo aliquet.
                            Aenean
                            id
                            mauris quis risus dictum rutrum.
                        </p>
                        <p>
                            Nam rutrum sapien a nulla sodales, a dignissim est placerat. Integer id condimentum nisi.
                            Mauris
                            at
                            lacus tellus. Morbi nec lectus vitae leo egestas hendrerit sit amet a nisi.
                        </p>
                        <p>Email: jovir463@gmail.com</p>
                        <p>Phone: 085295290661</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>