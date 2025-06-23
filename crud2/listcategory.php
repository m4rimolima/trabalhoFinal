<?php
include '../conexao.php';
include '../includes/menu.php';

if (isset($_SESSION['msg'])) {
    $msgClass = $_SESSION['msg_type'] === 'success' ? 'green' : 'red';
    echo "<p style='color: $msgClass; font-weight: bold'>" . htmlspecialchars($_SESSION['msg']) . "</p>";
    unset($_SESSION['msg'], $_SESSION['msg_type']);
}

try {
    $stmt = $pdo->query("SELECT * FROM category");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<p style='color:red;'>Erro ao buscar categorias: " . htmlspecialchars($e->getMessage()) . "</p>";
    $categories = []; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/trabalhofinal/assets/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet" />
    <title>CATEGORIES</title>
</head>
<body>
    <h2 class="editLabel">EDIT CATEGORY</h2>
 <br>
 <div class="cruds">
    <a class="buttonadd" href="/trabalhofinal/crud1/addbooks.php">NEW BOOK</a>
    <a class="buttonadd"href="addcategory.php">NEW CATEGORY</a>
</div>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $category['id_category'] ?></td>
            <td><?= htmlspecialchars($category['category_name']) ?></td>
            <td><?= htmlspecialchars($category['category_description']) ?></td>
            <td>
                <a href="/trabalhofinal/crud2/updatecategory.php?id=<?= $category['id_category'] ?>">Editar</a> |
                <a href="/trabalhofinal/crud2/deletecategory.php?id=<?= $category['id_category'] ?>" onclick="return confirm('Excluir categoria?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
    
</body>
</html>