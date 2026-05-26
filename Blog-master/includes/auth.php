<?php
// Session safety checks and authentication helpers

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Check if any user is logged in.
 * 
 * @return bool True if logged in, false otherwise.
 */
function is_logged_in() {
    return isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
}

/**
 * Backward compatibility wrapper for admin check.
 */
function is_admin_logged_in() {
    return is_logged_in();
}

/**
 * Restrict access to authenticated users only.
 */
function require_login() {
    if (!is_logged_in()) {
        header("Location: index.php?page=login");
        exit();
    }
}

/**
 * Backward compatibility wrapper for restricting access.
 */
function require_admin_login() {
    require_login();
}
?>
