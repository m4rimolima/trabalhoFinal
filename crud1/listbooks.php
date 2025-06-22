
<?php
include '../conexao.php';
include '../includes/menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/trabalhofinal/assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bodySignUp">
    

<table border="1">
<tr>
    <th>ID</th>
    <th>TITLE</th>
    <th>AUTHOR</th>
    <th>PUBLISHING DATE</th>
    <th>NUMBER OF PAGES</th>
    <th>CATEGORY</th>
    <th>ACTIONS</th>
</tr>
</body>
</html>
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
    INNER JOIN category ON books.id_category = category.id_category
");

$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($books as $book):
?>
    <tr>
        <td><?php echo $book['id_books']; ?></td>
        <td><?php echo htmlspecialchars($book['title_books']); ?></td>
        <td><?php echo htmlspecialchars($book['author_books']); ?></td>
        <td><?php echo htmlspecialchars($book['date_books']); ?></td>
        <td><?php echo htmlspecialchars($book['pages_books']); ?></td>
        <td><?php echo htmlspecialchars($book['category_name']); ?></td>
        <td>
            <a href="/trabalhofinal/crud1/updatebooks.php?id=<?php echo $book['id_books']; ?>&id_category=<?php echo $book['id_category']; ?>">Edit</a> |
            <a href="/trabalhofinal/crud1/deletebooks.php?id=<?php echo $book['id_books']; ?>" onclick="return confirm('delete book?')">Delete</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
    <a href="addbooks.php"> novo livro</a>

