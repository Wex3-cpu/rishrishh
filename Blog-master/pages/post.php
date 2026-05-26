<?php
// Get post ID
$post_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Get post details
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
$stmt->execute(['id' => $post_id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    header("Location: index.php?page=home");
    exit();
}

// Handle comment submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_comment'])) {
    $name = trim($_POST['name']);
    $comment = trim($_POST['comment']);
    
    $errors = [];
    if (empty($name)) $errors[] = "Name is required";
    if (empty($comment)) $errors[] = "Comment is required";
    
    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO comments (post_id, name, comment) VALUES (:post_id, :name, :comment)");
        $stmt->execute([
            'post_id' => $post_id,
            'name' => $name,
            'comment' => $comment
        ]);
        $success = "Comment added successfully!";
    }
}

// Get comments for this post
$stmt = $pdo->prepare("SELECT * FROM comments WHERE post_id = :post_id ORDER BY created_at DESC");
$stmt->execute(['post_id' => $post_id]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

$page_title = htmlspecialchars($post['title']) . " - My Blog";
include 'includes/header.php';
?>

<main class="container">
    <article class="single-post" style="overflow: hidden; border-radius: 16px;">
        <?php if (!empty($post['image_path'])): ?>
            <div class="post-banner-container" style="width: 100%; margin-bottom: 24px; border-radius: 12px; overflow: hidden; max-height: 450px;">
                <img src="<?php echo htmlspecialchars($post['image_path']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="post-banner-img" style="width: 100%; height: auto; display: block; object-fit: cover;">
            </div>
        <?php endif; ?>
        <h2><?php echo htmlspecialchars($post['title']); ?></h2>
        <div class="post-meta">Posted on: <?php echo date('F j, Y', strtotime($post['created_at'])); ?></div>
        <div class="post-content">
            <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
        </div>
        <a href="index.php?page=home" class="back-link">← Back to all posts</a>
    </article>

    <!-- Comments Section -->
    <div class="comments-section">
        <h3>Comments (<?php echo count($comments); ?>)</h3>
        
        <?php if (isset($success)): ?>
            <div class="success-msg"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <?php if (isset($errors) && !empty($errors)): ?>
            <div class="error-msg">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Display Comments -->
        <?php if (count($comments) > 0): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <strong><?php echo htmlspecialchars($comment['name']); ?></strong>
                    <span class="comment-date"><?php echo date('F j, Y g:i A', strtotime($comment['created_at'])); ?></span>
                    <p><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-comments">No comments yet. Be the first to comment!</p>
        <?php endif; ?>

        <!-- Comment Form -->
        <div class="comment-form">
            <h4>Leave a Comment</h4>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="comment">Comment *</label>
                    <textarea id="comment" name="comment" rows="4" required></textarea>
                </div>
                <button type="submit" name="submit_comment">Submit Comment</button>
            </form>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>