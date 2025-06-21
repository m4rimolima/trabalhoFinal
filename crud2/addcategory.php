<?php
include '../conexao.php';
include '../includes/menu.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';

    if (!empty($name) && !empty($description)) {
        $stmt = $pdo->prepare("INSERT INTO category (category_name, category_description) VALUES (?, ?)");
        $stmt->execute([$name, $description]);

        header("Location: listcategory.php");
        exit;
    } else {
        $error = "Preencha todos os campos!";
    }
}
?>

<h2>Nova Categoria</h2>

<?php if (isset($error)): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>
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
    

<form action="addcategory.php" method="POST">
    Nome: <input type="text" name="name" required><br>
    Descrição: <input type="text" name="description" required><br>
    <button type="submit">Salvar</button>
</form>
</body>
</html>

