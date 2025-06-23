
<?php
session_start();
include('protect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ULTRAVIOLET BOOKSTORE</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

</head>
<body class="homepage">
    <h1 class="h1Homepage">HOME PAGE</h1>
    Welcome to the home page, <?php echo htmlspecialchars($_SESSION['name']); ?>!
    <p>We're so sorry, but this page isn't ready yet!</p>
    <br><br>
    <a href="logout.php" class="logoutButton">Logout</a>
    <a href="/trabalhofinal/crud1/listbooks.php">
        <button type="button">Cadastrar Novo Livro</button>
    </a>

</form>

</body>
</html>
