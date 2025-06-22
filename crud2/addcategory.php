<?php
include '../conexao.php';
include '../includes/menu.php'; ?>
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';

    if (!empty($name) && !empty($description)) {
        $stmt = $pdo->prepare("INSERT INTO category (category_name, category_description) VALUES (?, ?)");
        $stmt->execute([$name, $description]);

        header("Location: listcategory.php");
        exit;
    } else {
        $error = "Fill all fields!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/trabalhofinal/assets/category.css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet" />
    <title>ADD CATEGORY</title>
</head>
<body class="bodySignUp">


    <div class="addbooksLabel">
        <h2 >ADD NEW CATEGORY</h2>
    </div>

    <?php if (isset($error)): ?>
        <p style="color:red; text-align:center;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="addcategory.php" method="POST">
        <label for="name">CATEGORY NAME</label><br />
        <input type="text" name="name" id="name" required autocomplete="off" /><br />

        <label for="description">DESCRIPTION</label><br />
        <input type="text" name="description" id="description" requi
