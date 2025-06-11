<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $dates = $_POST['dates'] ?? '';
    $pages = $_POST['pages'] ?? '';
    $category = $_POST['category'] ?? '';

    if ($title && $author && $dates && $pages && $category) {
        $stmt = $pdo->prepare("INSERT INTO books (title_books, author_books, date_books, pages_books, category_books) 
                               VALUES (:title, :author, :dates, :pages, :category)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':dates', $dates);
        $stmt->bindParam(':pages', $pages);
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        header("Location: listbooks.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER NEW BOOK</title>
</head>
<body>

    <h2>ADD NEW BOOK</h2>
    <form method="post" action="addbooks.php">
        <label>TITLE</label>
        <input type="text" name="title" required><br>

        <label>AUTHOR</label>
        <input type="text" name="author" required><br>

        <label>PUBLISHING DATE</label>
        <input type="text" name="dates" required><br>

        <label>NUMBER OF PAGES</label>
        <input type="text" name="pages" required><br>

        <label>CATEGORY</label>
        <input type="text" name="category" required><br>

        <button type="submit">ADD NEW BOOK</button>
    </form>

    <br>
    <a href="listbooks.php">Voltar para a lista</a>

</body>
</html>
