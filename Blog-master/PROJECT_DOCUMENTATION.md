# PORTFOLIO BLOG WEBSITE
## Project Documentation

---

### Submitted by:
**Irish Cueva**  
Bachelor of Science in Information Technology  
Talisay City College  
S.Y. 2025-2026

---

## TABLE OF CONTENTS

1. Introduction
2. Objectives of the Website
3. Tools and Technologies Used
4. System Features and Functions
5. Database Structure
6. Screenshots of The Website
7. Conclusion

---

## 1. INTRODUCTION

This project is a personal portfolio blog website that I created as part of my web development learning journey. The main purpose of this website is to showcase my profile, achievements, certifications, and also allow me to write blog posts about my experiences as an IT student.

I wanted to create something that's not just a simple static website, but something dynamic where I can actually manage content through a dashboard. That's why I decided to use PHP and MySQL for the backend so I can add, edit, and delete blog posts without touching the code every time.

The website also has a contact form where visitors can send me messages, and there's a comment section on each blog post so people can leave their thoughts. I also added a login system so only I can access the admin dashboard and manage the content.

Overall, this project helped me understand how websites work behind the scenes, especially how the frontend and backend connect with each other. It was challenging at first, especially dealing with the database connections and making sure everything works properly, but I learned a lot from building this.

---

## 2. OBJECTIVES OF THE WEBSITE

The main objectives of this portfolio blog website are:

### Primary Objectives:
- **To create a personal portfolio** where I can showcase my educational background, achievements, and certifications
- **To have a blogging platform** where I can share my experiences and thoughts as an IT student
- **To practice web development skills** using PHP, MySQL, HTML, CSS, and JavaScript
- **To implement CRUD operations** (Create, Read, Update, Delete) for managing blog posts and comments

### Secondary Objectives:
- **To learn database management** by creating and managing tables using phpMyAdmin
- **To implement user authentication** so only authorized users can manage content
- **To create a responsive design** that works on different screen sizes
- **To add interactive features** like comment sections and contact forms
- **To showcase my certifications** in an Instagram-style gallery layout

### Personal Learning Goals:
- Understand how PHP connects to MySQL database
- Learn how to handle form submissions and data validation
- Practice writing clean and organized code
- Implement security features like password hashing and SQL injection prevention
- Create a professional-looking website that I can actually use for my portfolio

---

## 3. TOOLS AND TECHNOLOGIES USED

For this project, I used several tools and technologies that we learned in our web development classes. Here's the complete list:

### Frontend Technologies:
- **HTML5** - For the structure and content of the web pages
- **CSS3** - For styling and making the website look good. I used a lot of glassmorphism effects and gradient backgrounds
- **JavaScript** - For interactive features like the lightbox gallery, tab switching, and form validation

### Backend Technologies:
- **PHP** - This is the main programming language I used for the server-side logic. PHP handles all the database operations, user authentication, and form processing
- **MySQL** - The database management system where I store all the data like blog posts, comments, user accounts, and contact messages

### Development Tools:
- **XAMPP** - I used this as my local server environment. It includes Apache (web server), MySQL (database), and PHP all in one package
- **phpMyAdmin** - This is the tool I used to manage my MySQL database. It has a web interface where I can create tables, insert data, and run SQL queries without using the command line
- **Visual Studio Code** - My code editor where I wrote all the HTML, CSS, PHP, and JavaScript code

### Additional Libraries:
- **Google Fonts** - I used "Outfit" and "Plus Jakarta Sans" fonts to make the typography look more modern
- **PDO (PHP Data Objects)** - For secure database connections and preventing SQL injection attacks

### Why I Chose These Technologies:
I chose PHP and MySQL because they're widely used in the industry and we learned them in class. XAMPP made it easy to set up a local server on my computer without complicated configurations. phpMyAdmin was really helpful because I could see my database tables visually instead of just typing SQL commands.

---

## 4. SYSTEM FEATURES AND FUNCTIONS

This section explains all the features and functions that I implemented in the website. I'll describe each page and what it does.

### 4.1 Home Page (Blog Feed)
The home page displays all the blog posts in a card layout. Each post shows the title, a short preview of the content, and the date it was published.

**Features:**
- Displays all blog posts from newest to oldest
- Search functionality to find specific posts by title
- "Read More" button that takes you to the full post
- If you're logged in, there's an "Add New Post" button
- Responsive design that adjusts to different screen sizes

**How it works:**
When the page loads, PHP queries the database to get all posts using `SELECT * FROM posts ORDER BY created_at DESC`. Then it loops through the results and displays each post in a card format.

### 4.2 About/Profile Page
This page shows information about me, including my personal details, educational background, and fun facts.

**Features:**
- Profile picture with avatar fallback if no image is uploaded
- Personal information (birthdate, location, age, etc.)
- Hobbies and interests section
- Educational timeline showing my schools from elementary to college
- Fun facts about me section (replaced the achievements)
- Contact buttons for email and messaging

**How it works:**
This is mostly a static page with PHP used to check if a profile picture exists. If the image file is found, it displays it; otherwise, it shows initials in a circle.

### 4.3 Achievements Page
A dedicated page showing my academic achievements organized by education level.

**Features:**
- Three tabs: Tertiary, Senior High, and Junior High & Basic
- Timeline cards showing Dean's List awards and honors
- Conduct awards from junior high school
- Tab switching without page reload using JavaScript
- Summary badges at the bottom of each tab

**How it works:**
JavaScript handles the tab switching. When you click a tab, it hides the current content and shows the selected tab's content with a fade-in animation.

### 4.4 Portfolio/Gallery Page
An Instagram-style gallery showcasing my certifications and personal life photos.

**Features:**
- Two tabs: Certifications and Personal Life
- Grid layout of images with hover effects
- Lightbox modal for viewing full-size images
- Navigation arrows to browse through images
- Like and bookmark functionality using localStorage
- Share button that copies a link to clipboard
- Deep-linking support (you can share specific images)

**How it works:**
All the image data is stored in JavaScript arrays. When you click an image, it opens a lightbox modal with the full image and details. The like/bookmark states are saved in the browser's localStorage so they persist even after you close the page.

### 4.5 Contact Page
A contact form where visitors can send me messages.

**Features:**
- Form with fields for name, email, subject, and message
- Form validation (both client-side and server-side)
- Contact information cards showing email, phone, location, and birthday
- Social media links
- Success message after form submission

**How it works:**
When someone submits the form, PHP validates the input to make sure all required fields are filled and the email is valid. If everything is okay, it inserts the message into the `contact_messages` table using a prepared statement: `INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)`.

### 4.6 Single Post Page
Shows the full content of a blog post with a comment section.

**Features:**
- Full blog post content
- Post title and publication date
- Comment section showing all comments for that post
- Form to add new comments
- "Back to all posts" link

**How it works:**
PHP gets the post ID from the URL (`$_GET['id']`) and queries the database for that specific post. It also gets all comments related to that post using `SELECT * FROM comments WHERE post_id = ?`. When someone submits a comment, it's inserted into the comments table.

### 4.7 Login/Signup Page
Authentication page where users can create an account or log in.

**Features:**
- Two side-by-side panels: Sign In and Sign Up
- Username and password fields
- Password confirmation for signup
- Error messages for invalid credentials
- Automatic login after successful signup
- Session management

**How it works:**
For login, PHP checks if the username and password match a record in the database using MD5 hashing. For signup, it first checks if the username is already taken, then inserts the new user. Sessions are used to keep track of logged-in users.

### 4.8 Dashboard (Admin Panel)
Only accessible when logged in. This is where I manage all the content.

**Features:**
- Create new blog posts
- Edit existing posts
- Delete posts
- View all comments
- Delete comments
- Tables showing all posts and comments with action buttons

**How it works:**
This page uses PHP to perform CRUD operations. Creating a post uses `INSERT INTO posts`, editing uses `UPDATE posts SET`, and deleting uses `DELETE FROM posts WHERE id = ?`. All operations use prepared statements for security.

### 4.9 User Authentication System
The login system that protects the dashboard.

**Features:**
- Session-based authentication
- Password hashing using MD5
- Login required for accessing dashboard
- Logout functionality
- Automatic redirect if not logged in

**How it works:**
When you log in, PHP creates a session variable `$_SESSION['user_logged_in'] = true`. Every protected page checks if this session exists. If not, it redirects to the login page. Logout destroys the session.

---

## 5. DATABASE STRUCTURE

The database is the heart of this website. It stores all the content and user information. I created the database using phpMyAdmin, which made it really easy to visualize the tables and relationships.

### Database Name: `portfolio_db`

### Table 1: `users`
This table stores user accounts for logging in.

| Column Name | Data Type | Description |
|------------|-----------|-------------|
| id | INT (Primary Key, Auto Increment) | Unique ID for each user |
| username | VARCHAR(50) | Username for login |
| password | VARCHAR(255) | Hashed password using MD5 |

**Sample Data:**
- Default admin account: username = "Irish", password = "Cueva" (hashed)

**How I created it:**
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
```

### Table 2: `posts`
This table stores all the blog posts.

| Column Name | Data Type | Description |
|------------|-----------|-------------|
| id | INT (Primary Key, Auto Increment) | Unique ID for each post |
| title | VARCHAR(200) | Title of the blog post |
| content | TEXT | Full content of the post |
| image_path | VARCHAR(255) | Path to post image (optional) |
| created_at | TIMESTAMP | Date and time when post was created |

**How I created it:**
```sql
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Table 3: `comments`
This table stores comments on blog posts.

| Column Name | Data Type | Description |
|------------|-----------|-------------|
| id | INT (Primary Key, Auto Increment) | Unique ID for each comment |
| post_id | INT (Foreign Key) | Links to the post being commented on |
| name | VARCHAR(100) | Name of the person commenting |
| comment | TEXT | The actual comment text |
| created_at | TIMESTAMP | Date and time of comment |

**Relationship:**
- `post_id` is a foreign key that references `posts.id`
- When a post is deleted, all its comments are also deleted (CASCADE)

**How I created it:**
```sql
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);
```

### Table 4: `contact_messages`
This table stores messages from the contact form.

| Column Name | Data Type | Description |
|------------|-----------|-------------|
| id | INT (Primary Key, Auto Increment) | Unique ID for each message |
| name | VARCHAR(100) | Sender's name |
| email | VARCHAR(255) | Sender's email |
| subject | VARCHAR(200) | Message subject |
| message | TEXT | The actual message |
| created_at | TIMESTAMP | Date and time message was sent |

**How I created it:**
```sql
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(200) NOT NULL DEFAULT '',
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Database Relationships Diagram:
```
users (1) -------- manages -------- (many) posts
                                        |
                                        |
                                    has many
                                        |
                                        v
                                   comments (many)

contact_messages (standalone table, no relationships)
```

### How I Used phpMyAdmin:
1. **Creating the Database:** I opened phpMyAdmin in my browser (localhost/phpmyadmin), clicked "New" and typed "portfolio_db" as the database name.

2. **Creating Tables:** For each table, I clicked on the database name, then clicked "SQL" tab and pasted my CREATE TABLE queries.

3. **Inserting Sample Data:** I used the "Insert" tab to add the default admin account and some sample blog posts for testing.

4. **Viewing Data:** The "Browse" tab let me see all the data in each table, which was really helpful for debugging.

5. **Running Queries:** When I needed to test something, I used the SQL tab to run custom queries like `SELECT * FROM posts WHERE title LIKE '%PHP%'`.

### Database Connection in PHP:
I created a file called `includes/db.php` that handles the database connection. It automatically tries different ports and passwords to work with both XAMPP and Docker setups:

```php
$pdo = new PDO("mysql:host=localhost;dbname=portfolio_db", 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

This connection is included in every page that needs database access.

---

## 6. SCREENSHOTS OF THE WEBSITE

Below are screenshots of the different pages and features of the website. These show how the website actually looks when you use it.

### Screenshot 1: Home Page (Blog Feed)
*[Insert screenshot here]*

**Caption:** The home page showing the blog posts in a card layout. You can see the search bar at the top and the "Add New Post" button for logged-in users. The gradient background uses Rose Quartz and Serenity colors.

---

### Screenshot 2: Single Blog Post Page
*[Insert screenshot here]*

**Caption:** A full blog post with the comment section below. Visitors can read the post and leave comments. The "Back to all posts" link is at the bottom.

---

### Screenshot 3: About/Profile Page (Top Section)
*[Insert screenshot here]*

**Caption:** The profile section showing my photo, personal details, and hobbies. The glassmorphism design makes the cards look modern and clean.

---

### Screenshot 4: About/Profile Page (Bottom Section)
*[Insert screenshot here]*

**Caption:** Educational timeline on the left and Fun Facts About Me on the right. The fun facts replaced the old achievements section.

---

### Screenshot 5: Achievements Page
*[Insert screenshot here]*

**Caption:** The achievements page with three tabs (Tertiary, Senior High, Junior High). Currently showing my Dean's List awards from college.

---

### Screenshot 6: Portfolio/Gallery Page (Certifications Tab)
*[Insert screenshot here]*

**Caption:** Instagram-style gallery showing my certifications. Each image has a hover effect that shows additional information.

---

### Screenshot 7: Portfolio Lightbox Modal
*[Insert screenshot here]*

**Caption:** When you click an image, it opens in a lightbox with full details, like and bookmark buttons, and navigation arrows.

---

### Screenshot 8: Contact Page
*[Insert screenshot here]*

**Caption:** Contact form on the right and contact information cards on the left. The form validates input before submission.

---

### Screenshot 9: Login/Signup Page
*[Insert screenshot here]*

**Caption:** Dual authentication panel with Sign In on the left and Sign Up on the right. New users can create an account here.

---

### Screenshot 10: Dashboard (Admin Panel)
*[Insert screenshot here]*

**Caption:** The admin dashboard where I can create, edit, and delete blog posts. Only accessible when logged in.

---

### Screenshot 11: Create/Edit Post Form
*[Insert screenshot here]*

**Caption:** Form for creating a new blog post or editing an existing one. Has fields for title and content.

---

### Screenshot 12: Manage Comments Table
*[Insert screenshot here]*

**Caption:** Table showing all comments from all posts. I can delete inappropriate comments from here.

---

### Screenshot 13: Mobile Responsive View
*[Insert screenshot here]*

**Caption:** The website on mobile view. The navigation menu and cards adjust to fit smaller screens.

---

### Screenshot 14: phpMyAdmin Database View
*[Insert screenshot here]*

**Caption:** phpMyAdmin showing the portfolio_db database with all four tables (users, posts, comments, contact_messages).

---

### Screenshot 15: Posts Table in phpMyAdmin
*[Insert screenshot here]*

**Caption:** The posts table showing all blog posts with their IDs, titles, content, and timestamps.

---

## 7. CONCLUSION

Creating this portfolio blog website was a really valuable learning experience for me. When I started, I only knew basic HTML and CSS, but through this project, I learned how to build a complete dynamic website with a database backend.

### What I Learned:
The most important thing I learned was how PHP and MySQL work together. Before this, I didn't really understand how websites store and retrieve data. Now I know how to write SQL queries, use prepared statements to prevent SQL injection, and handle form submissions properly.

I also learned about user authentication and sessions. Implementing the login system taught me how websites keep track of logged-in users and protect certain pages from unauthorized access.

The frontend part was fun too. I experimented with CSS glassmorphism effects, gradient backgrounds, and animations. The Instagram-style gallery was challenging to build, but I'm proud of how it turned out.

### Challenges I Faced:
The biggest challenge was getting the database connection to work. At first, I kept getting "Connection failed" errors because I was using the wrong port number. I had to research and test different configurations until it finally worked.

Another challenge was implementing the CRUD operations. I had to make sure that when I delete a post, all its comments are also deleted. That's when I learned about foreign keys and CASCADE delete.

Form validation was also tricky. I had to validate data both on the client-side (using JavaScript) and server-side (using PHP) to make sure no invalid data gets into the database.

### What I Would Improve:
If I had more time, I would add these features:
- Image upload for blog posts (currently only text)
- Rich text editor for formatting post content
- User profile pictures
- Email notifications when someone comments
- Better password security using bcrypt instead of MD5
- Admin approval for comments before they appear
- Categories or tags for blog posts
- Pagination for the blog feed

### Personal Reflection:
This project made me realize that web development is not just about making things look good. There's a lot of logic and planning involved, especially when dealing with databases and user data.

I'm happy with what I accomplished, and I actually use this website as my real portfolio now. It feels good to have something I built from scratch that I can show to potential employers or clients.

Overall, this project helped me understand the full web development process from planning to deployment. It gave me confidence that I can build real-world applications, not just follow tutorials.

### Future Plans:
I plan to keep improving this website as I learn new technologies. Maybe I'll add a blog post editor with image uploads, or implement a better authentication system. I might also add an API so I can access my blog posts from a mobile app.

For now, I'm satisfied with what I've built, and I'm excited to apply what I learned to future projects.

---

**End of Documentation**

---

### Acknowledgments:
I want to thank my professors for teaching me web development and for being patient when I asked questions. I also want to thank my classmates who helped me debug my code when I got stuck.

Special thanks to the online resources and tutorials that helped me understand PHP and MySQL better. Stack Overflow was a lifesaver when I encountered errors I couldn't figure out on my own.

---

**Date Submitted:** May 2026  
**Course:** Web Development / Database Management  
**Instructor:** [Professor Name]  
**Institution:** Talisay City College
