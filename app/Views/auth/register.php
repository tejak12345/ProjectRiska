<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna</title>

    <!-- Link ke CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Registrasi Pengguna</h2>

    <!-- Menampilkan pesan flashdata jika ada -->
    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('msg'); ?>
        </div>
    <?php endif; ?>

    <!-- Form Registrasi -->
    <form action="<?= site_url('auth/registrasi'); ?>" method="post">
        <?= csrf_field(); ?>  <!-- Untuk proteksi CSRF -->

        <!-- Input untuk Username -->
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= old('username'); ?>" required>
            <?php if (isset($validation) && $validation->hasError('username')): ?>
                <div class="text-danger"><?= $validation->getError('username'); ?></div>
            <?php endif; ?>
        </div>

        <!-- Input untuk Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email'); ?>" required>
            <?php if (isset($validation) && $validation->hasError('email')): ?>
                <div class="text-danger"><?= $validation->getError('email'); ?></div>
            <?php endif; ?>
        </div>

        <!-- Input untuk Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <?php if (isset($validation) && $validation->hasError('password')): ?>
                <div class="text-danger"><?= $validation->getError('password'); ?></div>
            <?php endif; ?>
        </div>

        <!-- Input untuk Konfirmasi Password -->
        <div class="form-group">
            <label for="password_confirm">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
            <?php if (isset($validation) && $validation->hasError('password_confirm')): ?>
                <div class="text-danger"><?= $validation->getError('password_confirm'); ?></div>
            <?php endif; ?>
        </div>
<div class="form-group">
    <label for="role">Role</label>
    <select name="role" id="role" class="form-control">
        <option value="customer" <?= old('role') == 'customer' ? 'selected' : ''; ?>>Customer</option>
        <option value="admin" <?= old('role') == 'admin' ? 'selected' : ''; ?>>Admin</option>
    </select>
    <div class="text-danger">
        <?= $validation->getError('role'); ?>
    </div>
</div>



        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary btn-block">Registrasi</button>

        <!-- Link ke halaman Login jika sudah punya akun -->
        <p class="mt-3 text-center">Sudah punya akun? <a href="<?= site_url('auth/login'); ?>">Login di sini</a></p>
    </form>
</div>

<!-- Link ke JS (misalnya untuk bootstrap) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

</body>
</html>
