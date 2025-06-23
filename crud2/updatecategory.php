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
        echo "Category not found.";
        exit;
    }
} else {
    echo "ID is not defined.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UPDATE CATEGORY</title>
    <link rel="stylesheet" href="/trabalhofinal/assets/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet" />
</head>
<body class="bodyedit">

    <h2 class="editLabel">EDIT CATEGORY</h2>

    <div class="signUpBox">
        <form action="updatecategory.php" method="POST">
            <input type="hidden" name="id" value="<?= $category['id_category'] ?>">

            <label class="labels">Nome:</label>
            <input class="inputBox" type="text" name="name" value="<?= htmlspecialchars($category['category_name']) ?>" required />

            <label class="labels">Descrição:</label>
            <input class="inputBox" type="text" name="description" value="<?= htmlspecialchars($category['category_description']) ?>" required />

            <div class="button-container">
                <button type="submit" class="buttonedit">SAVE CHANGES</button>
            </div>
        </form>
    </div>

    <br />
    <a href="listcategory.php" class="voltar">Go back</a>
    <img src="/trabalhofinal/assets/images/loginBanner.png" class="loginBanner" />
</body>
</html>