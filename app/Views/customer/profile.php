<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan - LeafletPro Farmasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/lucide-static@0.321.0/font/lucide.min.css" rel="stylesheet">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
    }

    .product-name {
        display: block;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-weight: bold;
        font-size: 1.125rem;
        color: #2d3748;
        max-width: 100%;
    }

    .product-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background-color: white;
        border-radius: 0.75rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        height: 100%;
    }

    .product-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        background-color: #f3f4f6;
    }

    .product-info {
        padding: 1rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .product-price {
        font-size: 1.125rem;
        font-weight: 600;
        color: #2b6cb0;
    }

    .product-description {
        font-size: 0.875rem;
        color: #4a5568;
        margin-bottom: 1rem;
        height: 50px;
        overflow: hidden;
    }

    .button-group {
        display: flex;
        justify-content: space-between;
        margin-top: auto;
    }

    .button-group button,
    .button-group a {
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-weight: 600;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
    }

    .button-group button:hover,
    .button-group a:hover {
        opacity: 0.8;
    }

    .btn-detail {
        background-color: #3182ce;
        color: white;
    }

    .btn-buy {
        background-color: #48bb78;
        color: white;
    }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-[#0F4C75] text-white p-4 shadow-md fixed top-0 w-full z-50">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo and Name (LeafletPro Farmasi) -->
            <div class="flex items-center space-x-3 order-1">
                <i data-lucide="file-text" class="w-8 h-8"></i>
                <h1 class="text-xl font-bold">LeafletPro Farmasi</h1>
            </div>

            <!-- User Name or Guest -->
            <div class="flex items-center space-x-2 order-2 lg:order-3">
                <img src="/customer.jpg" alt="Profil" class="rounded-full w-10 h-10">
                <div>
                    <!-- Menampilkan nama pengguna yang login -->
                    <?php if (session()->get('username')): ?>
                    <p class="text-sm font-semibold"><?= session()->get('username'); ?></p>
                    <p class="text-xs text-blue-200">Farmasis</p>
                    <?php else: ?>
                    <p class="text-sm font-semibold">Guest</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Hamburger Menu Toggle -->
            <button id="menu-toggle" class="lg:hidden block order-3 lg:order-2">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>
    </nav>
    <!-- Main Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 min-h-screen pt-20">
        <!-- Sidebar Menu -->
        <div id="sidebar"
            class="col-span-1 bg-white rounded-xl shadow-md p-6 lg:relative lg:block lg:min-h-screen hidden absolute left-0 top-0 w-full lg:w-auto">
            <ul class="space-y-4">
                <li>
                    <a href="/dashboard" class="flex items-center hover:bg-blue-50 p-3 rounded-lg">
                        <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/produk" class="flex items-center hover:bg-blue-50 p-3 rounded-lg">
                        <i data-lucide="file-text" class="w-5 h-5 mr-3"></i>
                        Produk
                    </a>
                </li>
                <li>
                    <a href="#pesanan" class="flex items-center hover:bg-blue-50 p-3 rounded-lg">
                        <i data-lucide="shopping-cart" class="w-5 h-5 mr-3"></i>
                        Pesanan Saya
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('profile') ?>"
                        class="flex items-center text-[#0F4C75] font-semibold bg-blue-50 p-3 rounded-lg">
                        <i data-lucide="user" class="w-5 h-5 mr-3"></i>
                        Profil Saya
                    </a>
                </li>
                <!-- Menambahkan tombol Logout -->
                <li class="pt-4 mt-4 border-t border-gray-700">
                    <a href="/customer/logout"
                        class="flex items-center text-red-400 hover:text-red-300 p-3 rounded-lg transition-all">
                        <i data-lucide="log-out" class="w-5 h-5 mr-3"></i>
                        <span class="font-medium">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="lg:col-span-3 p-6 bg-white rounded-xl shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Profil</h2>

            <!-- Menampilkan pesan sukses atau error -->
            <?php if (session()->get('success')): ?>
            <div class="alert alert-success bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                <?= session()->get('success'); ?>
            </div>
            <?php session()->remove('success');
            endif; ?>

            <?php if (session()->get('error')): ?>
            <div class="alert alert-danger bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                <?= session()->get('error'); ?>
            </div>
            <?php session()->remove('error');
            endif; ?>

            <form action="/profile/update" method="POST" class="space-y-6">
                <!-- CSRF Token -->
                <?= csrf_field(); ?>

                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
                    <input type="text" name="username" id="username" value="<?= esc($user['username']) ?>"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="<?= esc($user['email']) ?>"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat
                        Ini</label>
                    <input type="password" name="current_password" id="current_password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="new_password" class="block text-sm font-medium text-gray-700">Password Baru
                        (opsional)</label>
                    <input type="password" name="new_password" id="new_password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700">Konfirmasi
                        Password Baru</label>
                    <input type="password" name="confirm_password" id="confirm_password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Perbarui Profil
                    </button>
                </div>
            </form>
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

            // Fungsi untuk membuka modal dan mengisi konten detail produk
            window.openModal = function(name, price, description) {
                document.getElementById('productModal').classList.remove('hidden');
                document.getElementById('modalProductName').textContent = name;
                document.getElementById('modalProductPrice').textContent = price;
                document.getElementById('modalProductDescription').textContent = description;
            };

            // Fungsi untuk menutup modal
            document.getElementById('closeModal').addEventListener('click', () => {
                document.getElementById('productModal').classList.add('hidden');
            });
        });
        </script>