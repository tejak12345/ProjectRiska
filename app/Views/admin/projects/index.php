<!-- admin/projects/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
</head>
<body>
    <h1>Manage Projects</h1>
    <a href="/admin/projects/create">Create Project</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
                    <tr>
                        <td><?= esc($project['name']) ?></td>
                        <td><?= esc($project['status']) ?></td>
                        <td><?= esc($project['start_date']) ?></td>
                        <td><?= esc($project['end_date']) ?></td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
