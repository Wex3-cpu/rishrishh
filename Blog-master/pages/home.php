<?php
// Get search keyword
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Build query
if ($search) {
    $sql = "SELECT * FROM posts WHERE title LIKE :search ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['search' => "%$search%"]);
} else {
    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
    $stmt = $pdo->query($sql);
}
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$page_title = "Irish Cueva - Portfolio Blog";
include 'includes/header.php';
?>

<main class="container">
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h2>Welcome to My Blog</h2>
                <p>Sharing my journey as an IT student, along with my daily experiences, thoughts, and growth throughout college life.</p>
                <a href="index.php?page=about" class="hero-btn">Daily Life And Learning Experiences →</a>
            </div>
            <div class="hero-avatar">
                <div class="avatar-initials avatar-initials-md" title="Irish Cueva">IC</div>
            </div>
        </div>
    </section>

    <!-- Search Form -->
    <div class="search-section">
        <form method="GET" action="index.php">
            <input type="hidden" name="page" value="home">
            <input type="text" name="search" placeholder="Search blog posts..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">🔍 Search</button>
            <?php if ($search): ?>
                <a href="index.php?page=home" class="clear-btn">Clear</a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Blog Posts List -->
    <div class="posts-list">
        <div class="posts-list-header">
            <h3>Latest Posts</h3>
            <?php if (is_logged_in()): ?>
                <a href="index.php?page=login#create-post-form" class="add-post-btn">➕ Add New Post</a>
            <?php endif; ?>
        </div>

        <?php if (count($posts) > 0): ?>
            <?php foreach ($posts as $post): ?>
                <div class="post-card">
                    <?php if (!empty($post['image_path'])): ?>
                        <div class="post-card-image">
                            <a href="index.php?page=post&id=<?php echo $post['id']; ?>">
                                <img src="<?php echo htmlspecialchars($post['image_path']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" style="width: 100%; height: 200px; object-fit: cover; border-top-left-radius: 12px; border-top-right-radius: 12px; display: block;">
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="post-card-content" style="padding: 24px;">
                        <h4><a href="index.php?page=post&id=<?php echo $post['id']; ?>"><?php echo htmlspecialchars($post['title']); ?></a></h4>
                        <div class="post-meta">Posted on: <?php echo date('F j, Y', strtotime($post['created_at'])); ?></div>
                        <p><?php echo substr(htmlspecialchars($post['content']), 0, 150); ?>...</p>
                        <a href="index.php?page=post&id=<?php echo $post['id']; ?>" class="read-more">Read More →</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-posts">No blog posts found. <?php if ($search): ?>Try a different search term.<?php endif; ?></p>
        <?php endif; ?>
    </div>
</main>

<?php include 'includes/footer.php'; ?>