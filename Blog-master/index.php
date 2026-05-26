<?php
// Root Entry-Point Router (Front Controller Pattern)
require_once 'includes/db.php';
require_once 'includes/auth.php';

// Get current page parameter, default to 'home'
$page = isset($_GET['page']) ? trim($_GET['page']) : 'home';

// White-list of allowed templates (prevents LFI/Directory Traversal vulnerabilities)
$allowed_pages = [
    'home'         => 'pages/home.php',
    'about'        => 'pages/about.php',
    'achievements' => 'pages/achievements.php',
    'profile'      => 'pages/profile.php',
    'portfolio'    => 'pages/portfolio.php',
    'gallery'      => 'pages/portfolio.php', // Legacy fallback support
    'contact'      => 'pages/contact.php',
    'post'         => 'pages/post.php',
    'login'        => 'pages/login.php',
    'logout'       => 'pages/logout.php'
];

if (array_key_exists($page, $allowed_pages)) {
    include $allowed_pages[$page];
} else {
    // 404 fallback: display home
    include 'pages/home.php';
}
