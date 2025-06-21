<?php
include '../conexao.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID do livro não fornecido.";
    exit;
}

$id = (int)$_GET['id'];

$stmt = $pdo->prepare("DELETE FROM books WHERE id_books = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);


if ($stmt->execute()) {
    header("Location: listbooks.php"); 
    exit;
} else {
    echo "Erro ao excluir o livro.";
}
?>
