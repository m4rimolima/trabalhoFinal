<?php
include '../conexao.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Book id was not defined.";
    exit;
}

$id = (int)$_GET['id'];

$stmt = $pdo->prepare("DELETE FROM books WHERE id_books = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);


if ($stmt->execute()) {
    header("Location: listbooks.php"); 
    exit;
} else {
    echo "Couldn't delete book.";
}
?>
