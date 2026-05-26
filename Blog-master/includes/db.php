<?php
// Ultra-Robust PHP PDO Database Connector
// 1. Automatically scans common MySQL ports (3306, 3307, 3308)
// 2. Automatically scans XAMPP & Docker connection credentials
// 3. Automatically creates the database 'portfolio_db' if it doesn't exist
// 4. Automatically seeds the tables and default admin account if not initialized

$hosts = ['localhost', '127.0.0.1', 'mysql'];
$ports = ['3306', '3307', '3308'];
$passwords = ['', 'root'];

$pdo = null;
$env = '';

foreach ($hosts as $host) {
    foreach ($ports as $port) {
        foreach ($passwords as $password) {
            try {
                // Connect to MySQL server first (without database to prevent "Unknown database" errors)
                $dsn = "mysql:host=$host;port=$port;charset=utf8mb4";
                $temp_pdo = new PDO($dsn, 'root', $password);
                $temp_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Connection successful!
                $pdo = $temp_pdo;
                $env = ($host === 'mysql') ? 'docker' : 'xampp';
                break 3; // Break out of all 3 loops
            } catch (PDOException $e) {
                // Continue scanning combinations
            }
        }
    }
}

if (!$pdo) {
    die("Database connection failed: Could not connect to MySQL server on localhost or Docker. Please verify that MySQL is started in XAMPP Control Panel.");
}

// 1. Ensure the portfolio_db database exists and select it
try {
    $pdo->exec("CREATE DATABASE IF NOT EXISTS portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE portfolio_db");
} catch (PDOException $e) {
    die("Database selection failed: " . $e->getMessage());
}

// 2. Auto-initialize tables and seed data if tables are missing
try {
    // Check if the 'users' table exists
    $table_check = $pdo->query("SHOW TABLES LIKE 'users'")->fetch();
    if (!$table_check) {
        $sql_file = dirname(__DIR__) . '/database.sql';
        if (file_exists($sql_file)) {
            $sql_content = file_get_contents($sql_file);
            
            // Execute the schema statements
            $queries = explode(';', $sql_content);
            foreach ($queries as $query) {
                $query = trim($query);
                if (!empty($query)) {
                    // Skip root-level database creation statements as we handled them dynamically
                    if (stripos($query, 'CREATE DATABASE') === false && stripos($query, 'USE') === false) {
                        $pdo->exec($query);
                    }
                }
            }
        }
    }
} catch (PDOException $e) {
    // Fail silently during database import to avoid disrupting UX
}
?>
