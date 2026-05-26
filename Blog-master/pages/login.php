<?php
// Check if logged in
$is_logged_in = is_logged_in();

// Handle Sign In (Login)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = MD5(:password)");
    $stmt->execute(['username' => $user, 'password' => $pass]);
    
    if ($stmt->rowCount() > 0) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['username'] = $user;
        header("Location: index.php?page=login");
        exit();
    } else {
        $login_error = "Invalid username or password!";
    }
}

// Handle Sign Up (Registration)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);
    $confirm_pass = trim($_POST['confirm_password']);
    
    $reg_errors = [];
    if (empty($user)) $reg_errors[] = "Username is required.";
    if (strlen($user) < 3) $reg_errors[] = "Username must be at least 3 characters.";
    if (empty($pass)) $reg_errors[] = "Password is required.";
    if ($pass !== $confirm_pass) $reg_errors[] = "Passwords do not match.";
    
    if (empty($reg_errors)) {
        // Check if username is already taken
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $user]);
        
        if ($stmt->rowCount() > 0) {
            $reg_errors[] = "Username is already taken!";
        } else {
            // Save new user
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, MD5(:password))");
            $stmt->execute(['username' => $user, 'password' => $pass]);
            
            // Automatically log them in after sign up
            $_SESSION['user_logged_in'] = true;
            $_SESSION['username'] = $user;
            header("Location: index.php?page=login&signup_success=1");
            exit();
        }
    }
}

// CRUD Operations for Posts (Require Auth)

// Create Post
if ($is_logged_in && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_post'])) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    
    if (!empty($title) && !empty($content)) {
        $stmt = $pdo->prepare("INSERT INTO posts (title, content) VALUES (:title, :content)");
        $stmt->execute(['title' => $title, 'content' => $content]);
        $success = "Post created successfully!";
    } else {
        $error = "Title and content are required!";
    }
}

// Update Post
if ($is_logged_in && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_post'])) {
    $id = (int)$_POST['post_id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    
    if (!empty($title) && !empty($content)) {
        $stmt = $pdo->prepare("UPDATE posts SET title = :title, content = :content WHERE id = :id");
        $stmt->execute(['title' => $title, 'content' => $content, 'id' => $id]);
        $success = "Post updated successfully!";
    }
}

// Delete Post
if ($is_logged_in && isset($_GET['delete_post'])) {
    $id = (int)$_GET['delete_post'];
    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->execute(['id' => $id]);
    header("Location: index.php?page=login");
    exit();
}

// Delete Comment
if ($is_logged_in && isset($_GET['delete_comment'])) {
    $id = (int)$_GET['delete_comment'];
    $stmt = $pdo->prepare("DELETE FROM comments WHERE id = :id");
    $stmt->execute(['id' => $id]);
    header("Location: index.php?page=login");
    exit();
}

// Get all posts
$posts = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);

// Get all comments with post titles
$comments = $pdo->query("
    SELECT c.*, p.title as post_title 
    FROM comments c 
    JOIN posts p ON c.post_id = p.id 
    ORDER BY c.created_at DESC
")->fetchAll(PDO::FETCH_ASSOC);

// Get post for editing
$edit_post = null;
if ($is_logged_in && isset($_GET['edit_post'])) {
    $id = (int)$_GET['edit_post'];
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $edit_post = $stmt->fetch(PDO::FETCH_ASSOC);
}

$page_title = $is_logged_in ? "User Dashboard - Manage Posts" : "Sign In & Sign Up - Access Portfolio Blog";
include 'includes/header.php';
?>

<main class="container">
    <?php if (!$is_logged_in): ?>
        <!-- Dual Authentication Panel: Sign In and Sign Up -->
        <div class="auth-wrapper">
            <!-- 🔑 Sign In Panel -->
            <div class="auth-card signin-card">
                <h2>Sign In</h2>
                <p class="auth-subtitle">Welcome back! Please enter your credentials to login.</p>
                
                <?php if (isset($login_error)): ?>
                    <div class="error-msg"><?php echo $login_error; ?></div>
                <?php endif; ?>
                
                <form method="POST" action="index.php?page=login">
                    <div class="form-group">
                        <label for="signin-username">Username</label>
                        <input type="text" id="signin-username" name="username" required placeholder="Enter username...">
                    </div>
                    <div class="form-group">
                        <label for="signin-password">Password</label>
                        <input type="password" id="signin-password" name="password" required placeholder="Enter password...">
                    </div>
                    <button type="submit" name="login">Sign In 🔐</button>
                </form>
            </div>

            <!-- 📝 Sign Up Panel -->
            <div class="auth-card signup-card">
                <h2>Sign Up</h2>
                <p class="auth-subtitle">Create a new account to write posts on the home page!</p>
                
                <?php if (isset($reg_errors) && !empty($reg_errors)): ?>
                    <div class="error-msg">
                        <?php foreach ($reg_errors as $err): ?>
                            <p><?php echo htmlspecialchars($err); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="index.php?page=login">
                    <div class="form-group">
                        <label for="signup-username">Desired Username *</label>
                        <input type="text" id="signup-username" name="username" required placeholder="Choose a username...">
                    </div>
                    <div class="form-group">
                        <label for="signup-password">Password *</label>
                        <input type="password" id="signup-password" name="password" required placeholder="Create a password...">
                    </div>
                    <div class="form-group">
                        <label for="signup-confirm-password">Confirm Password *</label>
                        <input type="password" id="signup-confirm-password" name="confirm_password" required placeholder="Repeat your password...">
                    </div>
                    <button type="submit" name="register" class="signup-btn">Sign Up & Join 🚀</button>
                </form>
            </div>
        </div>
    <?php else: ?>
        <!-- Logged-in User Dashboard -->
        <div class="dashboard-header">
            <h2>User Dashboard</h2>
            <p>Welcome back, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>! 👋 You are now authorized to post to the homepage.</p>
        </div>
        
        <?php if (isset($_GET['signup_success'])): ?>
            <div class="success-msg">Welcome to Irish Cueva's Blog! Your new account has been successfully created and logged in.</div>
        <?php endif; ?>

        <?php if (isset($success)): ?>
            <div class="success-msg"><?php echo $success; ?></div>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Create/Edit Post Form -->
        <div class="form-card" id="create-post-form">
            <h3><?php echo $edit_post ? '✏️ Edit Post' : '➕ Create New Blog Post'; ?></h3>
            <form method="POST" action="index.php?page=login">
                <?php if ($edit_post): ?>
                    <input type="hidden" name="post_id" value="<?php echo $edit_post['id']; ?>">
                <?php endif; ?>
                <div class="form-group">
                    <label for="post-title">Post Title</label>
                    <input type="text" id="post-title" name="title" value="<?php echo $edit_post ? htmlspecialchars($edit_post['title']) : ''; ?>" required placeholder="Write a catchy title...">
                </div>
                <div class="form-group">
                    <label for="post-content">Post Content</label>
                    <textarea id="post-content" name="content" rows="6" required placeholder="Write your blog post content here..."><?php echo $edit_post ? htmlspecialchars($edit_post['content']) : ''; ?></textarea>
                </div>
                <button type="submit" name="<?php echo $edit_post ? 'update_post' : 'create_post'; ?>">
                    <?php echo $edit_post ? 'Update Post' : 'Publish Post 🚀'; ?>
                </button>
                <?php if ($edit_post): ?>
                    <a href="index.php?page=login" class="cancel-btn">Cancel Edit</a>
                <?php endif; ?>
            </form>
        </div>

        <!-- Manage Posts -->
        <div class="data-table">
            <h3>Manage Posts</h3>
            <?php if (count($posts) > 0): ?>
                <table>
                    <thead>
                        <tr><th>ID</th><th>Title</th><th>Date Published</th><th>Actions</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <td><?php echo $post['id']; ?></td>
                                <td><strong><?php echo htmlspecialchars($post['title']); ?></strong></td>
                                <td><?php echo date('M j, Y', strtotime($post['created_at'])); ?></td>
                                <td>
                                    <a href="index.php?page=login&edit_post=<?php echo $post['id']; ?>#create-post-form" class="edit-btn">Edit</a>
                                    <a href="index.php?page=login&delete_post=<?php echo $post['id']; ?>" class="delete-btn" onclick="return confirmDelete()">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No posts published yet. Create the first one above!</p>
            <?php endif; ?>
        </div>

        <!-- Manage Comments -->
        <div class="data-table">
            <h3>Manage Comments</h3>
            <?php if (count($comments) > 0): ?>
                <table>
                    <thead>
                        <tr><th>ID</th><th>Name</th><th>Comment</th><th>On Post</th><th>Date</th><th>Action</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comments as $comment): ?>
                            <tr>
                                <td><?php echo $comment['id']; ?></td>
                                <td><strong><?php echo htmlspecialchars($comment['name']); ?></strong></td>
                                <td><?php echo substr(htmlspecialchars($comment['comment']), 0, 50); ?>...</td>
                                <td><em><?php echo htmlspecialchars($comment['post_title']); ?></em></td>
                                <td><?php echo date('M j, Y', strtotime($comment['created_at'])); ?></td>
                                <td>
                                    <a href="index.php?page=login&delete_comment=<?php echo $comment['id']; ?>" class="delete-btn" onclick="return confirmDelete()">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No comments added yet.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>
