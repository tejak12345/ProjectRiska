<!-- File: app/Views/admin/create_edit_product.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah/Edit Produk</title>
    <link rel="stylesheet" href="path/to/your/css/style.css">
</head>

<body>
    <header>
        <h1><?= isset($product) ? 'Edit Produk' : 'Tambah Produk Baru'; ?></h1>
        <nav>
            <ul>
                <li><a href="/admin/products">Kembali ke Manajemen Produk</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <form action="<?= isset($product) ? '/admin/products/update/' . $product['id'] : '/admin/products/store'; ?>"
                method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div>
                    <label for="name">Nama Produk</label>
                    <input type="text" id="name" name="name" value="<?= isset($product) ? $product['name'] : ''; ?>"
                        required>
                </div>

                <div>
                    <label for="price">Harga Produk</label>
                    <input type="text" id="price" name="price" value="<?= isset($product) ? $product['price'] : ''; ?>"
                        required>
                </div>

                <div>
                    <label for="description">Deskripsi Produk</label>
                    <textarea id="description"
                        name="description"><?= isset($product) ? $product['description'] : ''; ?></textarea>
                </div>

                <div>
                    <label for="image">Gambar Produk</label>
                    <input type="file" id="image" name="image" <?= !isset($product) ? 'required' : ''; ?>>
                </div>

                <button type="submit"><?= isset($product) ? 'Perbarui Produk' : 'Tambah Produk'; ?></button>
            </form>
        </section>
    </main>
</body>

</html>