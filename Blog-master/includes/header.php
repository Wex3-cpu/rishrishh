<?php
// Start session and verify auth state
require_once __DIR__ . '/auth.php';

// Get current routing state for menu highlighting
$current_page = isset($page) ? $page : (isset($_GET['page']) ? trim($_GET['page']) : 'home');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : "Irish Cueva - Portfolio"; ?></title>
    <!-- Google Fonts import for premium, modern typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="index.php"><?php echo (is_logged_in() && $current_page === 'login') ? 'Dashboard' : 'Irish Cueva'; ?></a></h1>
            <nav>
                <a href="index.php?page=home" class="<?php echo ($current_page === 'home' || $current_page === 'post') ? 'active' : ''; ?>">Home</a>
                <a href="index.php?page=profile" class="<?php echo ($current_page === 'profile' || $current_page === 'about') ? 'active' : ''; ?>">About</a>
                <a href="index.php?page=achievements" class="<?php echo $current_page === 'achievements' ? 'active' : ''; ?>">Achievements</a>
                <a href="index.php?page=portfolio" class="<?php echo ($current_page === 'portfolio' || $current_page === 'gallery') ? 'active' : ''; ?>">Portfolio</a>
                <a href="index.php?page=contact" class="<?php echo $current_page === 'contact' ? 'active' : ''; ?>">Contact</a>

                <?php if (is_logged_in()): ?>
                    <a href="index.php?page=login" class="<?php echo $current_page === 'login' ? 'active' : ''; ?>">Dashboard</a>
                    <a href="index.php?page=logout" onclick="return confirmLogout()">Logout</a>
                <?php else: ?>
                    <a href="index.php?page=login" class="<?php echo $current_page === 'login' ? 'active' : ''; ?>">Login</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>