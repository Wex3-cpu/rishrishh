<?php
// Ensure messages table exists
$pdo->exec("CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(200) NOT NULL DEFAULT '',
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$errors = [];
$form = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_message'])) {
    $form['name'] = trim($_POST['name'] ?? '');
    $form['email'] = trim($_POST['email'] ?? '');
    $form['subject'] = trim($_POST['subject'] ?? '');
    $form['message'] = trim($_POST['message'] ?? '');

    if ($form['name'] === '') {
        $errors[] = 'Please fill out your name.';
    }
    if ($form['email'] === '' || !filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if ($form['message'] === '') {
        $errors[] = 'Please write your message.';
    }

    if (!$errors) {
        $stmt = $pdo->prepare(
            'INSERT INTO contact_messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)'
        );
        $stmt->execute([
            'name' => $form['name'],
            'email' => $form['email'],
            'subject' => $form['subject'],
            'message' => $form['message'],
        ]);
        header('Location: index.php?page=contact&sent=1');
        exit;
    }
}

$sent = isset($_GET['sent']) && $_GET['sent'] === '1';

$page_title = "Contact Me - Irish Cueva";
include 'includes/header.php';
?>

<main class="container">
    <section class="contact-section-modern">
        <!-- 📬 Modern Contact Panel Header -->
        <div class="contact-hero">
            <h2>✉️ Let's Connect</h2>
            <p>Have an interesting project, question, or job offer? Send me a message, and I'll get back to you within 24 hours!</p>
        </div>

        <?php if ($sent): ?>
            <div class="success-msg contact-flash" role="status">🎉 Message Sent Successfully! Thank you for reaching out.</div>
        <?php endif; ?>

        <?php if ($errors): ?>
            <div class="error-msg contact-flash" role="alert">
                <?php foreach ($errors as $err): ?>
                    <p>⚠️ <?php echo htmlspecialchars($err); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="contact-grid-layout">
            <!-- 📞 Left Column: Contact Cards -->
            <div class="contact-cards-column">
                <!-- Card 1: Email -->
                <div class="channel-card">
                    <div class="channel-icon-circle bg-light-blue">📧</div>
                    <div class="channel-text">
                        <span class="channel-title">Direct Email</span>
                        <a href="mailto:irishamarocueva@gmail.com" class="channel-link">irishamarocueva@gmail.com</a>
                    </div>
                </div>

                <!-- Card 2: Phone -->
                <div class="channel-card">
                    <div class="channel-icon-circle bg-light-green">📱</div>
                    <div class="channel-text">
                        <span class="channel-title">Phone Number</span>
                        <p class="channel-value">09555048457</p>
                    </div>
                </div>

                <!-- Card 3: Location -->
                <div class="channel-card">
                    <div class="channel-icon-circle bg-light-purple">📍</div>
                    <div class="channel-text">
                        <span class="channel-title">Current Address</span>
                        <p class="channel-value">Talisay City, Cebu, Philippines</p>
                    </div>
                </div>

                <!-- Card 4: Birthday -->
                <div class="channel-card">
                    <div class="channel-icon-circle bg-light-pink">🎂</div>
                    <div class="channel-text">
                        <span class="channel-title">Date of Birth</span>
                        <p class="channel-value">November 27, 2004</p>
                    </div>
                </div>

                <!-- Circular Social Buttons -->
                <div class="social-circles-group">
                    <h4>Connect on Social Media</h4>
                    <div class="circles-row">
                        <a href="#" class="social-circle github-c" title="GitHub">📂</a>
                        <a href="#" class="social-circle linkedin-c" title="LinkedIn">💼</a>
                        <a href="#" class="social-circle facebook-c" title="Facebook">👥</a>
                        <a href="#" class="social-circle instagram-c" title="Instagram">📸</a>
                    </div>
                </div>
            </div>

            <!-- 📝 Right Column: Modern Glass Contact Form -->
            <div class="contact-form-column">
                <form action="index.php?page=contact" method="POST" class="form-wrapper-modern">
                    <h3>Send a Direct Message</h3>
                    
                    <div class="form-group-modern">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($form['name']); ?>" placeholder="e.g. John Doe">
                    </div>
                    
                    <div class="form-group-modern">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($form['email']); ?>" placeholder="e.g. johndoe@example.com">
                    </div>
                    
                    <div class="form-group-modern">
                        <label for="subject">Subject Topic</label>
                        <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($form['subject']); ?>" placeholder="What's this message about?">
                    </div>
                    
                    <div class="form-group-modern">
                        <label for="message">Detailed Message *</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Write your message here..."><?php echo htmlspecialchars($form['message']); ?></textarea>
                    </div>
                    
                    <button type="submit" name="send_message" value="1" class="send-message-btn">Send Message 🚀</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
