
<?php
    $username = 'root';
    $pass = '';
    $database = 'ultraviolet_bd';
    $host = 'localhost';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
