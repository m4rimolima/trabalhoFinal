<?php
include '../conexao.php';
include '../includes/menu.php';

$stmtCat = $pdo->query("SELECT id_category, category_name FROM category");
$categories = $stmtCat->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $dates = $_POST['dates'] ?? '';
    $pages = $_POST['pages'] ?? '';
    $id_category = $_POST['id_category'] ?? '';

    if ($title && $author && $dates && $pages && $id_category) {
        $stmt = $pdo->prepare("INSERT INTO books (title_books, author_books, date_books, pages_books, id_category) 
                               VALUES (:title, :author, :dates, :pages, :id_category)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':dates', $dates);
        $stmt->bindParam(':pages', $pages);
        $stmt->bindParam(':id_category', $id_category);
        $stmt->execute();

        header("Location: listbooks.php");
        exit;
    } else {
        $erro = "Por favor, preencha todos os campos.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/trabalhofinal/assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>REGISTER NEW BOOK</title>
</head>
<body class="bodySignUp">

    <h2 class="addbooksLabel">ADD NEW BOOK</h2>
    <div class="signUpBox">
        <label for="title" class="labels">TITLE</label>
        <input type="text" name="title" id="title" required class="inputBox"><br>

        <label for="author" class="labels">AUTHOR</label>
        <input type="text" name="author" id="author" required class="inputBox"><br>

        <label for="dates" class="labels">PUBLISHING DATE</label>
        <input type="date" name="dates" id="dates" required class="inputBox"><br>

        <label for="pages" class="labels">NUMBER OF PAGES</label>
        <input type="number" name="pages" id="pages" required class="inputBox"><br>

        <label for="category" class="labels">CATEGORY</label>
        <select name="id_category" id="category" required class="inputBox">
            <option value="" class="labels">SELECT A CATEGORY</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id_category'] ?>">
                    <?= htmlspecialchars($category['category_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
<button type="submit" class="buttonaddbook">ADD NEW BOOK</button> 
</form></div>

<a href="/trabalhofinal/crud2/addcategory.php" class="signupText">Category doesn't exist? Create one.</a><br>
<a href="listbooks.php" class="signupText">Back to list.</a>

<img src="/trabalhofinal/assets/images/loginBanner.png" class="loginBanner" />

    <button type="submit" class="buttonaddbook">ADD NEW BOOK</button> 
    </form></div>
    <a href="/trabalhofinal/crud2/addcategory.php" class="signupText"> Category doesn't exist? create one.</a><br>
    <a href="listbooks.php" class="signupText">Back to list.</a>
   <img src="/trabalhofinal/assets/images/loginBanner.png" class="loginBanner" />

</body>
</html>
