<?php
include '../conexao.php';
include '../includes/menu.php';
include('../protect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/trabalhofinal/assets/list2.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>LIST BOOKS</title>
</head>
<body class="bodylistbooks">

    <br>
    <div class="cruds">
        <a class="buttonadd" href="/trabalhofinal/crud1/addbooks.php">NEW BOOK</a>
        <a class="buttonadd" href="/trabalhofinal/crud2/addcategory.php">NEW CATEGORY</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>AUTHOR</th>
                <th>PUBLISHING DATE</th>
                <th>NUMBER OF PAGES</th>
                <th>CATEGORY</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $stmt = $pdo->query(
            "SELECT 
                books.id_books,
                books.title_books,
                books.author_books,
                books.date_books,
                books.pages_books,
                category.category_name,
                category.id_category
            FROM books
            INNER JOIN category ON books.id_category = category.id_category"
        );

        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($books as $book):
        ?>
            <tr>
                <td><?= $book['id_books']; ?></td>
                <td class="name-column"><?= htmlspecialchars($book['title_books']); ?></td>
                <td><?= htmlspecialchars($book['author_books']); ?></td>
                <td><?= htmlspecialchars($book['date_books']); ?></td>
                <td><?= htmlspecialchars($book['pages_books']); ?></td>
                <td><?= htmlspecialchars($book['category_name']); ?></td>
                <td class="actions">
                    <a href="/trabalhofinal/crud1/updatebooks.php?id=<?= $book['id_books']; ?>&id_category=<?= $book['id_category']; ?>" class="edit">EDIT</a>
                    <a href="/trabalhofinal/crud1/deletebooks.php?id=<?= $book['id_books']; ?>" class="delete" onclick="return confirm('DELETE BOOK?')">DELETE</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
