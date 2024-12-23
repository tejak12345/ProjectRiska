<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan - LeafletPro Farmasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/lucide-static@0.321.0/font/lucide.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f0f4f8;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .product-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(66, 153, 225, 0.1), rgba(49, 130, 206, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover::before {
            opacity: 1;
        }

        .product-image {
            height: 250px;
            object-fit: cover;
            border-radius: 20px 20px 0 0;
            position: relative;
        }

        .product-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 30%;
            background: linear-gradient(to top, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0));
        }

        .price-tag {
            background: linear-gradient(135deg, #3182CE 0%, #2C5282 100%);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 20px;
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(49, 130, 206, 0.3);
        }

        .btn-modern {
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-modern::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%) scale(0);
            border-radius: 50%;
            transition: transform 0.5s ease;
        }

        .btn-modern:hover::before {
            transform: translate(-50%, -50%) scale(2);
        }

        .btn-detail {
            background: linear-gradient(135deg, #4299E1 0%, #3182CE 100%);
            color: white;
        }

        .btn-buy {
            background: linear-gradient(135deg, #48BB78 0%, #38A169 100%);
            color: white;
        }

        .navbar {
            background: linear-gradient(135deg, #2C5282 0%, #2B6CB0 100%);
        }

        .sidebar {
            background: white;
            border-radius: 24px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .sidebar-link {
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .sidebar-link:hover {
            background: linear-gradient(135deg, rgba(66, 153, 225, 0.1) 0%, rgba(49, 130, 206, 0.1) 100%);
        }

        .sidebar-link.active {
            background: linear-gradient(135deg, #4299E1 0%, #3182CE 100%);
            color: white;
        }

        /* Modern Search Bar */
        .search-bar {
            background: white;
            border-radius: 20px;
            padding: 0.8rem 1.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .search-bar:focus-within {
            box-shadow: 0 4px 15px rgba(66, 153, 225, 0.2);
        }

        /* Floating Labels */
        .floating-label {
            position: absolute;
            top: 0;
            left: 1rem;
            transform: translateY(-50%);
            background: white;
            padding: 0 0.5rem;
            color: #4A5568;
            font-size: 0.875rem;
        }

        /* Modern Modal */
        .modal-content {
            background: white;
            border-radius: 24px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .modal-backdrop {
            backdrop-filter: blur(8px);
            background: rgba(0, 0, 0, 0.4);
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 to-blue-100">
    <!-- Modern Navbar -->
    <nav class="navbar fixed w-full z-50 px-6 py-4 top-0 left-0">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                            <i data-lucide="file-text" class="w-6 h-6 text-blue-600"></i>
                        </div>
                        <h1 class="text-2xl font-bold text-white">LeafletPro</h1>
                    </div>
                </div>

                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-4 bg-white/10 rounded-2xl px-6 py-3">
                        <img src="https://via.placeholder.com/40" alt="Profile"
                            class="w-10 h-10 rounded-xl border-2 border-white/30">
                        <div>
                            <?php if (session()->get('username')): ?>
                                <p class="text-white font-semibold"><?= session()->get('username'); ?></p>
                                <p class="text-blue-200 text-sm capitalize"><?= session()->get("role"); ?></p>
                            <?php else: ?>
                                <p class="text-white font-semibold">Guest</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <button class="lg:hidden text-white">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container mx-auto grid grid-cols-1 lg:grid-cols-4 gap-6 min-h-screen pt-28">
        <!-- Modern Sidebar -->
        <div class="lg:col-span-1">
                <div class="sidebar p-6 sticky top-28">
                    <div class="space-y-3">
                        <a href="/dashboard" class="sidebar-link flex active items-center p-4 hover:bg-blue-50">
                            <i data-lucide="layout-dashboard" class="w-5 h-5 mr-4"></i>
                            <span class="font-medium">Dashboard</span>
                        </a>
                        <a href="/produk" class="sidebar-link flex items-center p-4 hover:bg-blue-50">
                            <i data-lucide="file-text" class="w-5 h-5 mr-4"></i>
                            <span class="font-medium">Produk</span>
                        </a>
                        <a href="<?= base_url("pesanan") ?>"
                            class="sidebar-link flex  items-center p-4 hover:bg-blue-50">
                            <i data-lucide="shopping-cart" class="w-5 h-5 mr-4"></i>
                            <span class="font-medium">Pesanan</span>
                        </a>
                        <a href="<?= base_url('profile') ?>"
                            class="sidebar-link flex items-center p-4 hover:bg-blue-50">
                            <i data-lucide="user" class="w-5 h-5 mr-4"></i>
                            <span class="font-medium">Profil</span>
                        </a>

                        <div class="pt-4 mt-4 border-t border-gray-100">
                            <a href="/customer/logout"
                                class="sidebar-link flex items-center p-4 text-red-500 hover:bg-red-50">
                                <i data-lucide="log-out" class="w-5 h-5 mr-4"></i>
                                <span class="font-medium">Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Main Content -->
        <div class="col-span-3 p-6 lg:p-0">
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