<?php include 'conexao.php'; ?>
<h2>Lista de livros</h2>
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

    <?php
    $stmt = $pdo->query("SELECT * FROM books");
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($books as $book):
    ?>
        <tr>
            <td><?php echo $book['id_books']; ?></td>
            <td><?php echo htmlspecialchars($book['title_books']); ?></td>
            <td><?php echo htmlspecialchars($book['author_books']); ?></td>
            <td><?php echo htmlspecialchars($book['date_books']); ?></td>
            <td><?php echo htmlspecialchars($book['pages_books']); ?></td>
            <td><?php echo htmlspecialchars($book['category_books']); ?></td>
            <td>
                <a href="updatebooks.php?id=<?php $book['id_books'] ?>">Edit</a> |
                <a href="deletebooks.php?id=<?php $book['id_books'] ?>" onclick="return confirm('delete book?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>


