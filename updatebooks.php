<?php
include 'conexao.php';

if (!isset($_POST['id_books'])) {
    die("ID do livro não fornecido. ");
}
$id = $_POST['id_books'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("UPDATE books SET title = :titulo, author = :author, dates = :dates, pages = :pages, category = :category WHERE id_books = :id");
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
}
?>

<h2>Editar Livro</h2>
<form method="post">
    <input type="text" name="title" value="<?php htmlspecialchars($livro['title'])  ?>" required>
    <input type="text" name="author" value="<?php htmlspecialchars($livro['author']) ?>" required>
    <input type="text" name="dates" value="<?php htmlspecialchars($livro['dates']) ?>" required>
    <input type="text" name="pages" value="<?php htmlspecialchars($livro['pages']) ?>" required>
    <input type="text" name="category" value="<?php htmlspecialchars($livro['category']) ?>" required>
    <button type="submit">Salvar alterações</button>
</form>
<br>
<a href="index.php">Voltar</a>
