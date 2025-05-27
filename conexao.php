
<?php
    $username = 'root';
    $pass = '01102014@Jm';
    $database = 'tela_de_login';
    $host = 'localhost';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
