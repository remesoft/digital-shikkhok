<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : "Student Dashboard"; ?></title>
    <link rel="stylesheet" href="assets/css/student.css">
</head>
<body>
    <!-- Student Header -->
    <header>
        <nav>
            <ul>
                <li><a href="student.php">Dashboard</a></li>
                <li><a href="courses.php">My Courses</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <!-- Main Content -->
    <main>
        <?php echo $content; ?>
    </main>
    <!-- Student Footer -->
    <footer>
        <p>Student Panel - © <?php echo date("Y"); ?></p>
    </footer>
</body>
</html>
