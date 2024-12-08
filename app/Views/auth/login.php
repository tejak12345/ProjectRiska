<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeafletPro Farmasi - Login</title>
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

        .login-container {
            display: flex;
            width: 100%;
            max-width: 1100px;
            background: white;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
        }

        .login-image {
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

        .login-image-content {
            max-width: 300px;
        }

        .login-image svg {
            max-width: 200px;
            margin-bottom: 20px;
        }

        .login-form {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form h2 {
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

        .form-group input:focus+i {
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

        .login-footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }

        .error-message {
            color: #dc3545;
            margin-top: 10px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-image,
            .login-form {
                flex: none;
                width: 100%;
                padding: 30px;
            }

            .login-image {
                display: none;
            }
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .custom-control-input:checked~.custom-control-label::before {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-image">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="white">
                <path d="M50 20 L70 50 H30 L50 20 Z" opacity="0.8" />
                <path d="M50 80 L30 50 H70 L50 80 Z" opacity="0.8" />
                <circle cx="50" cy="50" r="15" fill="none" stroke="white" stroke-width="3" />
            </svg>
            <div class="login-image-content">
                <h3>LeafletPro Farmasi</h3>
                <p>Platform Manajemen Informasi Farmasi Terpadu</p>
            </div>
        </div>
        <div class="login-form">
            <h2>Masuk ke Sistem</h2>

            <!-- Pesan kesalahan -->
            <?php if (session()->getFlashdata('msg')): ?>
                <div class="error-message">
                    <?= session()->getFlashdata('msg'); ?>
                </div>
            <?php endif; ?>

            <!-- Form Login -->
            <form action="<?= site_url('auth/login'); ?>" method="post">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" required
                        placeholder="Username" autofocus>
                    <i class="fas fa-user"></i>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" required
                        placeholder="Password">
                    <i class="fas fa-lock"></i>
                </div>

                <div class="remember-forgot">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Ingat Saya</label>
                    </div>
                    <a href="#" class="text-primary">Lupa Password?</a>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Masuk
                </button>
            </form>

            <div class="login-footer">
                <p class="mt-3">
                    Belum punya akun?
                    <a href="<?= site_url('auth/registrasi'); ?>" class="text-primary">
                        Daftar Sekarang
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</body>

</html>