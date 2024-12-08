<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - LeafletPro Farmasi</title>
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
    <!-- Navbar (same as previous dashboard) -->
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
            <!-- Sidebar Menu (same as previous dashboard) -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <ul class="space-y-4">
                    <li>
                        <a href="#dashboard" class="flex items-center hover:bg-blue-50 p-3 rounded-lg">
                            <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#proyek"
                            class="flex items-center text-[#0F4C75] font-semibold bg-blue-50 p-3 rounded-lg">
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

            <!-- Produk Content -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-[#0F4C75]">Produk Leaflet</h2>
                        <div class="flex space-x-2">
                            <input type="text" placeholder="Cari produk..." class="px-3 py-2 border rounded-lg w-64">
                            <button
                                class="bg-[#1A73E8] text-white px-4 py-2 rounded-full hover:bg-[#0F4C75] transition">
                                Cari
                            </button>
                        </div>
                    </div>

                    <!-- Produk Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Produk Item 1 -->
                        <div class="bg-gray-50 rounded-xl p-4 shadow-sm hover:shadow-md transition">
                            <a href="<?= base_url('customer/detail/1') ?>">
                                <img src="https://via.placeholder.com/250" alt="Produk Leaflet"
                                    class="w-full h-48 object-cover rounded-lg mb-4 cursor-pointer">
                            </a>
                            <h3 class="font-semibold text-[#0F4C75] mb-2">Leaflet Informasi Vaksin</h3>
                            <p class="text-sm text-gray-600 mb-2">Desain profesional untuk informasi vaksinasi</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-[#1A73E8]">Rp 150.000</span>
                            </div>
                        </div>

                        <!-- Produk Item 2 -->
                        <div class="bg-gray-50 rounded-xl p-4 shadow-sm hover:shadow-md transition">
                            <img src="https://via.placeholder.com/250" alt="Produk Leaflet"
                                class="w-full h-48 object-cover rounded-lg mb-4">
                            <h3 class="font-semibold text-[#0F4C75] mb-2">Infografis Kesehatan</h3>
                            <p class="text-sm text-gray-600 mb-2">Desain informatif untuk edukasi kesehatan</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-[#1A73E8]">Rp 200.000</span>

                            </div>
                        </div>

                        <!-- Produk Item 3 -->
                        <div class="bg-gray-50 rounded-xl p-4 shadow-sm hover:shadow-md transition">
                            <img src="https://via.placeholder.com/250" alt="Produk Leaflet"
                                class="w-full h-48 object-cover rounded-lg mb-4">
                            <h3 class="font-semibold text-[#0F4C75] mb-2">Leaflet Edukasi Diabetes</h3>
                            <p class="text-sm text-gray-600 mb-2">Desain komprehensif untuk pasien diabetes</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-[#1A73E8]">Rp 175.000</span>

                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-center mt-8 space-x-2">
                        <button class="bg-gray-200 px-4 py-2 rounded-lg hover:bg-gray-300">1</button>
                        <button class="bg-gray-200 px-4 py-2 rounded-lg hover:bg-gray-300">2</button>
                        <button class="bg-gray-200 px-4 py-2 rounded-lg hover:bg-gray-300">3</button>
                        <button
                            class="bg-[#1A73E8] text-white px-4 py-2 rounded-lg hover:bg-[#0F4C75]">Selanjutnya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();
    });
    </script>
</body>

</html>