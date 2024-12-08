<!-- admin/products/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h1>Manage Products</h1>
    <a href="/admin/products/create">Create New Product</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= esc($product['name']) ?></td>
                    <td><?= esc($product['price']) ?></td>
                    <td><?= esc($product['description']) ?></td>
                    <td>
                        <a href="/admin/products/edit/<?= esc($product['id']) ?>">Edit</a>
                        <a href="/admin/products/delete/<?= esc($product['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
