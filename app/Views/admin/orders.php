<!-- File: app/Views/admin/orders.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pesanan</title>
    <link rel="stylesheet" href="path/to/your/css/style.css">
</head>

<body>
    <header>
        <h1>Manajemen Pesanan</h1>
        <nav>
            <ul>
                <li><a href="/admin/dashboard">Dashboard</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Daftar Pesanan</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Nama Produk</th>
                        <th>Pelanggan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= $order['id']; ?></td>
                            <td><?= $order['product_name']; ?></td>
                            <td><?= $order['customer_name']; ?></td>
                            <td>
                                <form action="/admin/orders/update/<?= $order['id']; ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="Pending" <?= $order['status'] == 'Pending' ? 'selected' : ''; ?>>Pending
                                        </option>
                                        <option value="Processing" <?= $order['status'] == 'Processing' ? 'selected' : ''; ?>>
                                            Processing</option>
                                        <option value="Shipped" <?= $order['status'] == 'Shipped' ? 'selected' : ''; ?>>Shipped
                                        </option>
                                        <option value="Completed" <?= $order['status'] == 'Completed' ? 'selected' : ''; ?>>
                                            Completed</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <a href="/admin/orders/view/<?= $order['id']; ?>">Lihat Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>