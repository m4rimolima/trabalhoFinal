<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id_books'])) {
        die("ID do livro não fornecido no POST.");
            $stmt = $pdo->prepare("UPDATE books SET title = :title, author = :author, dates = :dates, pages = :pages, category = :category WHERE id_books = :id");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':dates', $dates);
            $stmt->bindParam(':pages', $pages);
            $stmt->bindParam(':category', $category);
            $stmt->execute();
            header("Location: index.php");
            exit;
        } else {
            $stmt = $pdo->prepare("SELECT * FROM books WHERE id_books = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $book = $stmt->fetch(PDO::FETCH_ASSOC);
        }}
        ?>

<h2>Editar Livro</h2>
<form method="post">
    <input type="text" name="title" value="<?php htmlspecialchars($book['title'])  ?>" required>
    <input type="text" name="author" value="<?php htmlspecialchars($book['author']) ?>" required>
    <input type="text" name="dates" value="<?php htmlspecialchars($book['dates']) ?>" required>
    <input type="text" name="pages" value="<?php htmlspecialchars($book['pages']) ?>" required>
    <input type="text" name="category" value="<?php htmlspecialchars($book['category']) ?>" required>
    <button type="submit">Salvar alterações</button>
</form>
<br>
<a href="index.php">Voltar</a>
