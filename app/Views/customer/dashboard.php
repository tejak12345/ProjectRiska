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
            <!-- Logo and Name (LeafletPro Farmasi) -->
            <div class="flex items-center space-x-3 order-1">
                <i data-lucide="file-text" class="w-8 h-8"></i>
                <h1 class="text-xl font-bold">LeafletPro Farmasi</h1>
            </div>

            <!-- User Name or Guest -->
            <div class="flex items-center space-x-2 order-2 lg:order-3">
                <img src="https://via.placeholder.com/40" alt="Profil" class="rounded-full w-10 h-10">
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
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 min-h-screen pt-20">
        <!-- Sidebar Menu -->
        <div id="sidebar"
            class="col-span-1 bg-white rounded-xl shadow-md p-6 lg:relative lg:block lg:min-h-screen hidden absolute left-0 top-0 w-full lg:w-auto">
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
                    <a href="customer/profile" class="flex items-center hover:bg-blue-50 p-3 rounded-lg">
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

        <!-- Main Content -->
        <div class="col-span-3 bg-gray-50 p-6 lg:p-0">
            <!-- Dashboard Overview -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-[#0F4C75]">Dashboard</h2>
                    <button class="bg-[#1A73E8] text-white px-4 py-2 rounded-full hover:bg-[#0F4C75] transition">
                        Buat Proyek Baru
                    </button>
                </div>

                <!-- Status Proyek -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <div class="flex justify-between items-center">
                            <i data-lucide="check-circle" class="w-8 h-8 text-green-500"></i>
                            <p class="text-2xl font-bold text-[#0F4C75]">5</p>
                        </div>
                        <p class="mt-2 text-sm text-gray-600">Proyek Selesai</p>
                    </div>
                    <div class="bg-yellow-50 p-4 rounded-lg">
                        <div class="flex justify-between items-center">
                            <i data-lucide="clock" class="w-8 h-8 text-yellow-500"></i>
                            <p class="text-2xl font-bold text-[#0F4C75]">2</p>
                        </div>
                        <p class="mt-2 text-sm text-gray-600">Proyek Berjalan</p>
                    </div>
                    <div class="bg-red-50 p-4 rounded-lg">
                        <div class="flex justify-between items-center">
                            <i data-lucide="alert-circle" class="w-8 h-8 text-red-500"></i>
                            <p class="text-2xl font-bold text-[#0F4C75]">1</p>
                        </div>
                        <p class="mt-2 text-sm text-gray-600">Revisi Diperlukan</p>
                    </div>
                </div>

                <!-- Proyek Terakhir -->
                <div class="mt-8">
                    <h3 class="text-xl font-semibold text-[#0F4C75] mb-4">Proyek Terakhir</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-semibold">Leaflet Informasi Vaksin COVID-19</p>
                                <p class="text-sm text-gray-600">Mulai: 15 Desember 2023</p>
                            </div>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">Selesai</span>
                        </div>
                    </div>
                </div>
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