<!-- admin/orders/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>
<body>
    <h1>Manage Orders</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= esc($order['id']) ?></td>
                        <td><?= esc($order['user_id']) ?></td>
                        <td><?= esc($order['total_price']) ?></td>
                        <td><?= esc($order['status']) ?></td>
                        <td>
                            <a href="/admin/orders/view/<?= esc($order['id']) ?>">View</a>
                            <a href="/admin/orders/update/<?= esc($order['id']) ?>">Update</a>
                        </td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
