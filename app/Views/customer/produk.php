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
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-[#0F4C75] text-white p-4 shadow-md fixed top-0 w-full z-50">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <i data-lucide="file-text" class="w-8 h-8"></i>
                <h1 class="text-xl font-bold">LeafletPro Farmasi</h1>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button id="notifikasi-toggle" class="hover:text-blue-200 transition">
                        <i data-lucide="bell" class="w-6 h-6"></i>
                        <span
                            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <img src="https://via.placeholder.com/40" alt="Profil" class="rounded-full w-10 h-10">
                    <div>
                        <p class="text-sm font-semibold">Dr. Widya Pratama</p>
                        <p class="text-xs text-blue-200">Farmasis</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container mx-auto mt-20 px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Sidebar Menu -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <ul class="space-y-4">
                    <li>
                        <a href="#dashboard"
                            class="flex items-center text-[#0F4C75] font-semibold bg-blue-50 p-3 rounded-lg">
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
                        <a href="#konsultasi" class="flex items-center hover:bg-blue-50 p-3 rounded-lg">
                            <i data-lucide="message-circle" class="w-5 h-5 mr-3"></i>
                            Konsultasi
                        </a>
                    </li>
                    <li>
                        <a href="#profil" class="flex items-center hover:bg-blue-50 p-3 rounded-lg">
                            <i data-lucide="user" class="w-5 h-5 mr-3"></i>
                            Profil Saya
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Customer Product List -->
            <div class="content-area bg-gray-50 rounded-xl shadow-md p-6">
                <h2 class="text-2xl font-bold text-[#2C3E50] mb-6">Our Products</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($products as $product): ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <!-- Product Image -->
                        <?php if ($product['image'] && file_exists(ROOTPATH . '/public/img/products/' . $product['image'])): ?>
                        <img src="<?= base_url('/img/products/' . $product['image']) ?>"
                            alt="<?= esc($product['name']) ?>" class="w-full h-48 object-cover">
                        <?php else: ?>
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                        <?php endif; ?>

                        <!-- Product Details -->
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-[#2C3E50]"><?= esc($product['name']) ?></h3>
                            <p class="text-gray-500 mb-2">Rp <?= esc(number_format($product['price'], 0, ',', '.')) ?>
                            </p>
                            <p class="text-gray-700"><?= esc($product['description']) ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>