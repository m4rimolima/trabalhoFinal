<?php
include '../conexao.php';
include '../includes/menu.php';

$stmtCat = $pdo->query("SELECT id_category, category_name FROM category");
$categories = $stmtCat->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $dates = $_POST['dates'] ?? '';
    $pages = $_POST['pages'] ?? '';
    $id_category = $_POST['id_category'] ?? '';

    if ($title && $author && $dates && $pages && $id_category) {
        $stmt = $pdo->prepare("INSERT INTO books (title_books, author_books, date_books, pages_books, id_category) 
                               VALUES (:title, :author, :dates, :pages, :id_category)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':dates', $dates);
        $stmt->bindParam(':pages', $pages);
        $stmt->bindParam(':id_category', $id_category);
        $stmt->execute();

        header("Location: listbooks.php");
        exit;
    } else {
        $erro = "Por favor, preencha todos os campos.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet
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
        <input type="date" name="dates" required><br>

        <label>NUMBER OF PAGES</label>
        <input type="number" name="pages" required><br>

        <label for="category">Categoria:</label>
            <select name="id_category" id="category" required>
                <option value="">Selecione uma categoria</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id_category'] ?>">
                        <?= htmlspecialchars($category['category_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
    <button type="submit">ADD NEW BOOK</button> 
    </form>
    <a href="/trabalhofinal/crud2/addcategory.php"> nova categoria</a>
    <a href="listbooks.php">Voltar para a lista</a>


</body>
</html>
