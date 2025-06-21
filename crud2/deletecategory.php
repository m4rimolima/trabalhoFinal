<?php
session_start();
include '../conexao.php';

$idCategory = $_GET['id'] ?? null;

try {
    $stmt = $pdo->prepare("DELETE FROM category WHERE id_category = ?");
    $stmt->execute([$idCategory]);

    $_SESSION['msg'] = "Categoria excluída com sucesso!";
    $_SESSION['msg_type'] = "success";

    header("Location: listcategory.php");
    exit;

} catch (PDOException $e) {
    if ($e->getCode() === '23000') {
        $_SESSION['msg'] = "Lamentamos, mas você não pode apagar uma categoria que está vinculada a um livro.";
        $_SESSION['msg_type'] = "error";
    } else {
        error_log($e->getMessage());
        $_SESSION['msg'] = "Erro ao tentar apagar a categoria.";
        $_SESSION['msg_type'] = "error";
    }

    header("Location: listcategories.php");
    exit;
}
?>
