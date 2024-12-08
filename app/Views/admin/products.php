<!-- File: app/Views/admin/products.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk</title>
    <link rel="stylesheet" href="path/to/your/css/style.css">
</head>

<body>
    <header>
        <h1>Manajemen Produk</h1>
        <nav>
            <ul>
                <li><a href="/admin/dashboard">Dashboard</a></li>
                <li><a href="/admin/products/create">Tambah Produk Baru</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Daftar Produk</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $product['name']; ?></td>
                            <td><?= $product['price']; ?></td>
                            <td><?= $product['description']; ?></td>
                            <td>
                                <a href="/admin/products/edit/<?= $product['id']; ?>">Edit</a> |
                                <a href="/admin/products/delete/<?= $product['id']; ?>"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>