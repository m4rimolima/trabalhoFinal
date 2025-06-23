<?php
session_start();
include '../conexao.php';

$idCategory = $_GET['id'] ?? null;

try {
    $stmt = $pdo->prepare("DELETE FROM category WHERE id_category = ?");
    $stmt->execute([$idCategory]);

    header("Location: listcategory.php?msg=success");
    exit;

} catch (PDOException $e) {
    if ($e->getCode() === '23000') {
        $msg = urlencode("SORRY, YOU CAN'T DELETE A CATEGORY THAT BELONGS TO A BOOK.");
    } else {
        $msg = urlencode("ERROR DELETING CATEGORY.");
    }
    header("Location: listcategory.php?error=" . $msg);
    exit;
}
?>
