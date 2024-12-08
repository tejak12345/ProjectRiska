<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeafletPro Farmasi - Registrasi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0a6ebd;
            --secondary-color: #20b2aa;
            --background-color: #f4f7f6;
            --text-color: #333;
        }

        body {
            background: linear-gradient(135deg, var(--background-color) 0%, #ffffff 100%);
            font-family: 'Nunito', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 15px;
            color: var(--text-color);
        }

        .registration-container {
            display: flex;
            width: 100%;
            max-width: 1100px;
            background: white;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
        }

        .registration-image {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            color: white;
            text-align: center;
        }

        .registration-image-content {
            max-width: 300px;
        }

        .registration-image svg {
            max-width: 200px;
            margin-bottom: 20px;
        }

        .registration-form {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .registration-form h2 {
            color: var(--primary-color);
            margin-bottom: 30px;
            font-weight: 700;
            text-align: center;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-control {
            height: 50px;
            border: none;
            border-bottom: 2px solid #e0e0e0;
            border-radius: 0;
            padding-left: 40px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            box-shadow: none;
            border-bottom-color: var(--primary-color);
        }

        .form-group i {
            position: absolute;
            left: 10px;
            top: 15px;
            color: var(--primary-color);
            transition: 0.3s;
        }

        .form-group input:focus+i,
        .form-group select:focus+i {
            color: var(--primary-color);
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            height: 50px;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }

        .error-message {
            color: #dc3545;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .registration-container {
                flex-direction: column;
            }

            .registration-image,
            .registration-form {
                flex: none;
                width: 100%;
                padding: 30px;
            }

            .registration-image {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <div class="registration-image">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="white">
                <path d="M50 20 L70 50 H30 L50 20 Z" opacity="0.8" />
                <path d="M50 80 L30 50 H70 L50 80 Z" opacity="0.8" />
                <circle cx="50" cy="50" r="15" fill="none" stroke="white" stroke-width="3" />
            </svg>
            <div class="registration-image-content">
                <h3>LeafletPro Farmasi</h3>
                <p>Platform Manajemen Informasi Farmasi Terpadu</p>
            </div>
        </div>
        <div class="registration-form">
            <h2>Registrasi Pengguna</h2>

            <!-- Menampilkan pesan kesalahan -->
            <?php if (session()->getFlashdata('msg')): ?>
                <div class="error-message text-center">
                    <?= session()->getFlashdata('msg'); ?>
                </div>
            <?php endif; ?>

            <!-- Form Registrasi -->
            <form action="<?= site_url('auth/registrasi'); ?>" method="post">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" 
                           value="<?= old('username'); ?>" required placeholder="Username">
                    <i class="fas fa-user"></i>
                    <?php if (isset($validation) && $validation->hasError('username')): ?>
                        <div class="text-danger"><?= $validation->getError('username'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" 
                           value="<?= old('email'); ?>" required placeholder="Email">
                    <i class="fas fa-envelope"></i>
                    <?php if (isset($validation) && $validation->hasError('email')): ?>
                        <div class="text-danger"><?= $validation->getError('email'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" 
                           required placeholder="Password">
                    <i class="fas fa-lock"></i>
                    <?php if (isset($validation) && $validation->hasError('password')): ?>
                        <div class="text-danger"><?= $validation->getError('password'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password_confirm" 
                           name="password_confirm" required placeholder="Konfirmasi Password">
                    <i class="fas fa-lock"></i>
                    <?php if (isset($validation) && $validation->hasError('password_confirm')): ?>
                        <div class="text-danger"><?= $validation->getError('password_confirm'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <select name="role" id="role" class="form-control">
                        <option value="customer" <?= old('role') == 'customer' ? 'selected' : ''; ?>>Customer</option>
                        <option value="admin" <?= old('role') == 'admin' ? 'selected' : ''; ?>>Admin</option>
                    </select>
                    <i class="fas fa-user-tag"></i>
                    <?php if (isset($validation) && $validation->hasError('role')): ?>
                        <div class="text-danger"><?= $validation->getError('role'); ?></div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Registrasi</button>

                <div class="login-link">
                    <p class="mt-3">
                        Sudah punya akun? 
                        <a href="<?= site_url('auth/login'); ?>" class="text-primary">
                            Login di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</body>
</html>