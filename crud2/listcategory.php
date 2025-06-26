<?php
session_start();
include '../conexao.php';
include '../includes/menu.php';
include('../protect.php');

if (isset($_GET['error'])) {
    $jsMsg = addslashes($_GET['error']);
    echo "<script>alert('$jsMsg');</script>";
}

if (isset($_GET['msg']) && $_GET['msg'] === 'success') {
    echo "<script>alert('CATEGORY DELETED SUCCESSFULLY!');</script>";
}

try {
    $stmt = $pdo->query("SELECT * FROM category");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<p style='color:red;'>Couldn't find categories: " . htmlspecialchars($e->getMessage()) . "</p>";
    $categories = []; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/trabalhofinal/assets/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet" />
    <title>CATEGORIES</title>
</head>
<body>

    <br>
    <div class="cruds">
        <a class="buttonadd" href="/trabalhofinal/crud1/addbooks.php">NEW BOOK</a>
        <a class="buttonadd" href="/trabalhofinal/crud2/addcategory.php">NEW CATEGORY</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $category['id_category'] ?></td>
                <td class="name-column"><?= htmlspecialchars($category['category_name']) ?></td>
                <td><?= htmlspecialchars($category['category_description']) ?></td>
                <td class="actions">
                    <a href="/trabalhofinal/crud2/updatecategory.php?id=<?= $category['id_category'] ?>" class="edit">EDIT</a>
                    <a href="/trabalhofinal/crud2/deletecategory.php?id=<?= $category['id_category'] ?>" class="delete" onclick="return confirm('DELETE CATEGORY?')">DELETE</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
