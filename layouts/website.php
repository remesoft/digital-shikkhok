<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : "Digital-Shikkhok"; ?></title>
    <link rel="stylesheet" href="assets/css/website.css">
</head>
<body>
    <!-- Website Header -->
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    <!-- Main Content -->
    <main>
        <?php echo $content; ?>
    </main>
    <!-- Website Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Courses Website. All rights reserved.</p>
    </footer>
</body>
</html>
