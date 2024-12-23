<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : "Admin Panel"; ?></title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
    <!-- Admin Header -->
    <header>
        <nav>
            <ul>
                <li><a href="admin.php">Dashboard</a></li>
                <li><a href="manage-users.php">Manage Users</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <!-- Main Content -->
    <main>
        <?php echo $content; ?>
    </main>
    <!-- Admin Footer -->
    <footer>
        <p>Admin Panel - © <?php echo date("Y"); ?></p>
    </footer>
</body>
</html>
