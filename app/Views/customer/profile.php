<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan - LeafletPro Farmasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/lucide-static@0.321.0/font/lucide.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0f7ff 0%, #e8f0fe 100%);
        }

        .nav-shadow {
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .form-input {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .form-input:focus {
            border-color: #3182ce;
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.1);
        }

        .sidebar-link {
            transition: all 0.2s ease;
        }

        .sidebar-link:hover {
            transform: translateX(5px);
        }

        .profile-card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }
    </style>
</head>

<body class="min-h-screen">
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-[#0F4C75] to-[#1a6098] text-white p-4 nav-shadow fixed top-0 w-full z-50">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <i data-lucide="file-text" class="w-8 h-8"></i>
                <h1 class="text-xl font-bold">LeafletPro Farmasi</h1>
            </div>

            <div class="flex items-center space-x-4">
                <div class="hidden md:flex items-center space-x-2 bg-white/10 px-4 py-2 rounded-lg">
                    <i data-lucide="user" class="w-5 h-5"></i>
                    <?php if (session()->get('username')): ?>
                            <span class="text-sm font-medium"><?= session()->get('username'); ?></span>
                            <span class="text-xs bg-blue-400 px-2 py-1 rounded-full">Farmasis</span>
                    <?php else: ?>
                            <span class="text-sm font-medium">Guest</span>
                    <?php endif; ?>
                </div>
                <img src="/customer.jpg" alt="Profil" class="rounded-full w-10 h-10 border-2 border-white/50">
            </div>

            <button id="menu-toggle" class="lg:hidden">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 min-h-screen pt-24 px-4 md:px-6">
        <!-- Sidebar -->
        <div id="sidebar" class="lg:col-span-1 hidden lg:block">
            <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                <ul class="space-y-2">
                    <li>
                        <a href="/dashboard" class="sidebar-link flex items-center p-3 rounded-lg hover:bg-blue-50 group">
                            <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3 text-gray-500 group-hover:text-blue-600"></i>
                            <span class="text-gray-700 group-hover:text-blue-600">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/produk" class="sidebar-link flex items-center p-3 rounded-lg hover:bg-blue-50 group">
                            <i data-lucide="file-text" class="w-5 h-5 mr-3 text-gray-500 group-hover:text-blue-600"></i>
                            <span class="text-gray-700 group-hover:text-blue-600">Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="/pesanan" class="sidebar-link flex items-center p-3 rounded-lg hover:bg-blue-50 group">
                            <i data-lucide="shopping-cart" class="w-5 h-5 mr-3 text-gray-500 group-hover:text-blue-600"></i>
                            <span class="text-gray-700 group-hover:text-blue-600">Pesanan Saya</span>
                        </a>
                    </li>
                    <li>
                        <a href="/profile" class="sidebar-link flex items-center p-3 rounded-lg bg-blue-50 text-blue-600">
                            <i data-lucide="user" class="w-5 h-5 mr-3"></i>
                            <span class="font-medium">Profil Saya</span>
                        </a>
                    </li>
                    <li class="pt-4 mt-4 border-t border-gray-200">
                        <a href="/customer/logout" class="sidebar-link flex items-center p-3 rounded-lg hover:bg-red-50 group">
                            <i data-lucide="log-out" class="w-5 h-5 mr-3 text-red-400 group-hover:text-red-500"></i>
                            <span class="text-red-400 group-hover:text-red-500 font-medium">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Profile Edit Form -->
        <div class="lg:col-span-4">
            <div class="profile-card rounded-xl shadow-lg p-8">
                <div class="flex items-center space-x-4 mb-8">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <i data-lucide="user-cog" class="w-6 h-6 text-blue-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Edit Profil</h2>
                </div>

                <?php if (session()->get('success')): ?>
                    <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-lg flex items-center">
                        <i data-lucide="check-circle" class="w-5 h-5 text-green-400 mr-3"></i>
                        <p class="text-green-700"><?= session()->get('success'); ?></p>
                    </div>
                    <?php session()->remove('success'); endif; ?>

                <?php if (session()->get('error')): ?>
                    <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-lg flex items-center">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-red-400 mr-3"></i>
                        <p class="text-red-700"><?= session()->get('error'); ?></p>
                    </div>
                    <?php session()->remove('error'); endif; ?>

                <form action="/profile/update" method="POST" class="space-y-6">
                    <?= csrf_field(); ?>
                    
                    <div class="space-y-2">
                        <label for="username" class="text-sm font-medium text-gray-700">Nama Pengguna</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="user" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input type="text" name="username" id="username" value="<?= esc($user['username']) ?>"
                                class="form-input pl-10 w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="mail" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input type="email" name="email" id="email" value="<?= esc($user['email']) ?>"
                                class="form-input pl-10 w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="current_password" class="text-sm font-medium text-gray-700">Password Saat Ini</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="lock" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input type="password" name="current_password" id="current_password"
                                class="form-input pl-10 w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="new_password" class="text-sm font-medium text-gray-700">Password Baru (opsional)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="key" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input type="password" name="new_password" id="new_password"
                                class="form-input pl-10 w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="confirm_password" class="text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="check-circle" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input type="password" name="confirm_password" id="confirm_password"
                                class="form-input pl-10 w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit"
                            class="flex items-center space-x-2 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                            <i data-lucide="save" class="w-5 h-5"></i>
                            <span>Perbarui Profil</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
            
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');

            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>