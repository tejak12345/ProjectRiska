<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Login Pengguna</h2>

        <!-- Menampilkan pesan flashdata jika ada -->
        <?php if (session()->getFlashdata('msg')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('msg'); ?>
            </div>
        <?php endif; ?>

        <!-- Form Login -->
        <form action="<?= site_url('auth/login'); ?>" method="post">
            <?= csrf_field(); ?> <!-- Untuk proteksi CSRF -->

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login</button>

            <p class="mt-3 text-center">Belum punya akun? <a href="<?= site_url('auth/registrasi'); ?>">Daftar di
                    sini</a></p>
        </form>
    </div>

    <!-- Link ke JS (misalnya untuk bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

</body>

</html>