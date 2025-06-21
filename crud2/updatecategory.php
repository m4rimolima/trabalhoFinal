<?php
include '../conexao.php';
include '../includes/menu.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("UPDATE category SET category_name = ?, category_description = ? WHERE id_category = ?");
    $stmt->execute([$name, $description, $id]);

    header("Location: listcategory.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM category WHERE id_category = ?");
    $stmt->execute([$id]);
    $category = $stmt->fetch();

    if (!$category) {
        echo "Categoria não encontrada.";
        exit;
    }
} else {
    echo "ID não informado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet
    <title>Document</title>
</head>
<body>
    

<h2>Editar Categoria</h2>
<form action="updatecategory.php" method="POST">
    <input type="hidden" name="id" value="<?= $category['id_category'] ?>">
    Nome: <input type="text" name="name" value="<?= htmlspecialchars($category['category_name']) ?>" required><br>
    Descrição: <input type="text" name="description" value="<?= htmlspecialchars($category['category_description']) ?>" required><br>
    <button type="submit">Atualizar</button>
</form>
</body>
</html>