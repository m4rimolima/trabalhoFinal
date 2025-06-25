<?php
include '../conexao.php';
include '../includes/menu.php';

$id_books = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $dates = $_POST['dates'];
    $pages = $_POST['pages'];
    $category = $_POST['category'];

    $stmt = $pdo->prepare("UPDATE books 
        SET title_books = :title, author_books = :author, date_books = :dates, pages_books = :pages, id_category = :category 
        WHERE id_books = :id");

    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':dates', $dates);
    $stmt->bindParam(':pages', $pages);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':id', $id_books);
    
    $stmt->execute();

    header("Location: listbooks.php");
    exit;
} 

$stmt = $pdo->prepare(
    "SELECT 
        books.id_books,
        books.title_books,
        books.author_books,
        books.date_books,
        books.pages_books,
        books.id_category,  
        category.category_name
    FROM books
    INNER JOIN category ON books.id_category = category.id_category
    WHERE id_books = :id
");

$stmt->bindParam(':id', $id_books);
$stmt->execute();
$book = $stmt->fetch(PDO::FETCH_ASSOC);

$stmtCategories = $pdo->query("SELECT id_category, category_name FROM category");
$categories = $stmtCategories->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>EDIT BOOK</title>
    <link rel="stylesheet" href="/trabalhofinal/assets/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet" />
</head>
<body class="bodyedit">

<h2 class="editLabel">EDIT BOOK</h2>

<div class="signUpBox">
    <form method="post">
        <label class="labels"> TITLE:</label>
        <input class="inputBox" type="text" name="title" value="<?php echo htmlspecialchars($book['title_books']); ?>" required />

        <label class="labels"> AUTHOR:</label>
        <input class="inputBox" type="text" name="author" value="<?php echo htmlspecialchars($book['author_books']); ?>" required />

        <label class="labels"> PUBLISHING DATES:</label>
        <input class="inputBox" type="text" name="dates" value="<?php echo htmlspecialchars($book['date_books']); ?>" required />

        <label class="labels"> NUMBER OF PAGES:</label>
        <input class="inputBox" type="text" name="pages" value="<?php echo htmlspecialchars($book['pages_books']); ?>" required />

        <label class="labels"> CATEGORY:</label>
        <select class="inputBox" name="category" required>
            <?php foreach ($categories as $category): ?>
                <option  value="<?php echo $category['id_category']; ?>" 
                    <?php if ($category['id_category'] == $book['id_category']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($category['category_name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
<br>
        <div class="button-container">
            <button type="submit" class="buttonedit">SAVE CHANGES</button>
        </div>
    </form>
</div>
<br />
<a href="/trabalhofinal/crud1/listbooks.php" class="voltar">Go back</a>
<img src="/trabalhofinal/assets/images/loginBanner.png" class="loginBanner" />
</body>
</html>
