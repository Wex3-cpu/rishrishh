-- Create database
CREATE DATABASE IF NOT EXISTS portfolio_db;
USE portfolio_db;

-- Users table (admin and general user accounts)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Insert default admin account if not already present (Irish / Cueva)
INSERT IGNORE INTO users (id, username, password) VALUES (1, 'Irish', MD5('Cueva'));

-- Posts table (CRUD target)
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Comments table
CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);

-- Insert sample posts if not already present
INSERT IGNORE INTO posts (id, title, content) VALUES 
(1, 'Welcome to My Blog', 'This is my first blog post. I will be sharing my journey as a web developer. Stay tuned for more content!'),
(2, 'Learning PHP and MySQL', 'Today I learned how to connect PHP to MySQL database. It was challenging but fun! CRUD operations are very useful.');

-- Insert sample comments if not already present
INSERT IGNORE INTO comments (id, post_id, name, comment) VALUES 
(1, 1, 'John', 'Congratulations on your new blog! Looking forward to more posts.'),
(2, 1, 'Maria', 'Nice design! Simple and clean.');

-- Contact form messages (used by contact.php)
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(200) NOT NULL DEFAULT '',
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;