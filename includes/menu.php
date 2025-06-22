<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet" href="/trabalhofinal/assets/menu.css">
<div class="navbar">
    <div class="navbar-center">ULTRAVIOLET BOOKSTORE</div>
    <div class="navbar-right">
        <a href="/homepage.php">HOME</a>
        <a href="/trabalhofinal/crud1/listbooks.php">BOOKS</a>
        <a href="/trabalhofinal/crud2/listcategory.php">CATEGORY</a>
        <a href="/trabalhofinal/logout.php">LOGOUT</a>
    </div>
</div>
