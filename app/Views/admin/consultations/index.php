<!-- admin/consultations/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultations</title>
</head>
<body>
    <h1>Manage Consultations</h1>
    <a href="/admin/consultations/create">Create Consultation</a>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consultations as $consultation): ?>
                    <tr>
                        <td><?= esc($consultation['date']) ?></td>
                        <td><?= esc($consultation['description']) ?></td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
