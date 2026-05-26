<?php
// Shared footer template
$current_page = isset($page) ? $page : (isset($_GET['page']) ? trim($_GET['page']) : 'home');
$footer_text = ($current_page === 'login' || $current_page === 'post') ? 'My Portfolio Blog' : 'Irish Cueva';
?>
    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($footer_text); ?>. All rights reserved.</p>
        </div>
    </footer>
    <script src="assets/js/script.js" defer></script>
</body>
</html>
