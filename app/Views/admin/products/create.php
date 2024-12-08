<!-- admin/products/create.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>

<body>
    <h1>Create Product</h1>
    <form action="/admin/products/store" method="POST" enctype="multipart/form-data">
        <label for="name">Product Name</label>
        <input type="text" name="name" required><br>
        <label for="price">Price</label>
        <input type="number" name="price" required><br>
        <label for="description">Description</label>
        <textarea name="description" required></textarea><br>
        <label for="image">Image</label>
        <input type="file" name="image"><br>
        <button type="submit">Save</button>
    </form>
</body>

</html>