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
    <nav class="bg-gradient-to-r from-[#0F4C75] to-[#1A73E8] text-white p-4 shadow-xl fixed top-0 w-full z-50">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <i data-lucide="file-text" class="w-10 h-10 text-white"></i>
                <h1 class="text-2xl font-bold tracking-tight">LeafletPro Farmasi</h1>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button id="notification-toggle" class="hover:bg-blue-600 p-2 rounded-full">
                        <i data-lucide="bell" class="w-6 h-6"></i>
                        <span
                            class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-4 h-4 flex items-center justify-center text-xs">3</span>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <img src="https://via.placeholder.com/40" alt="Profil" class="rounded-full w-10 h-10">
                    <div>
                        <p class="font-semibold">Dr. Sarah Wijaya</p>
                        <p class="text-xs text-blue-100">Farmasis</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container mx-auto mt-24 px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Sidebar Navigation -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <ul class="space-y-4">
                    <li>
                        <a href="#" class="flex items-center text-[#0F4C75] font-semibold bg-blue-50 p-3 rounded-lg">
                            <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center hover:bg-blue-50 p-3 rounded-lg">
                            <i data-lucide="file-text" class="w-5 h-5 mr-3"></i>
                            Proyek Leaflet
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center hover:bg-blue-50 p-3 rounded-lg">
                            <i data-lucide="message-square" class="w-5 h-5 mr-3"></i>
                            Konsultasi
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center hover:bg-blue-50 p-3 rounded-lg">
                            <i data-lucide="settings" class="w-5 h-5 mr-3"></i>
                            Pengaturan
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="md:col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-md p-6 text-center">
                        <i data-lucide="file-text" class="w-12 h-12 mx-auto mb-4 text-[#1A73E8]"></i>
                        <h3 class="font-semibold text-[#0F4C75] mb-2">Proyek Aktif</h3>
                        <p class="text-3xl font-bold text-[#1A73E8]">4</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-md p-6 text-center">
                        <i data-lucide="check-circle" class="w-12 h-12 mx-auto mb-4 text-green-500"></i>
                        <h3 class="font-semibold text-[#0F4C75] mb-2">Proyek Selesai</h3>
                        <p class="text-3xl font-bold text-green-500">12</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-md p-6 text-center">
                        <i data-lucide="clock" class="w-12 h-12 mx-auto mb-4 text-yellow-500"></i>
                        <h3 class="font-semibold text-[#0F4C75] mb-2">Dalam Proses</h3>
                        <p class="text-3xl font-bold text-yellow-500">2</p>
                    </div>
                </div>

                <!-- Proyek Terbaru -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-[#0F4C75]">Proyek Terbaru</h2>
                        <a href="#" class="text-[#1A73E8] hover:underline">Lihat Semua</a>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b pb-4">
                            <div>
                                <h3 class="font-semibold text-[#0F4C75]">Leaflet Informasi Obat Jantung</h3>
                                <p class="text-sm text-gray-500">Dimulai: 15 Desember 2023</p>
                            </div>
                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs">Dalam
                                Proses</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-4">
                            <div>
                                <h3 class="font-semibold text-[#0F4C75]">Desain Infografis Diabetes</h3>
                                <p class="text-sm text-gray-500">Dimulai: 10 Desember 2023</p>
                            </div>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Selesai</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-semibold text-[#0F4C75]">Leaflet Edukasi Kesehatan Lansia</h3>
                                <p class="text-sm text-gray-500">Dimulai: 5 Desember 2023</p>
                            </div>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Selesai</span>
                        </div>
                    </div>
                </div>

                <!-- Konsultasi Terbaru -->
                <div class="bg-white rounded-xl shadow-md p-6 mt-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-[#0F4C75]">Konsultasi Terbaru</h2>
                        <a href="#" class="text-[#1A73E8] hover:underline">Lihat Semua</a>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b pb-4">
                            <div>
                                <h3 class="font-semibold text-[#0F4C75]">Perubahan Desain Leaflet</h3>
                                <p class="text-sm text-gray-500">17 Desember 2023</p>
                            </div>
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs">Baru</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-semibold text-[#0F4C75]">Konfirmasi Detail Proyek</h3>
                                <p class="text-sm text-gray-500">15 Desember 2023</p>
                            </div>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Selesai</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-[#0F4C75] text-white py-8 mt-12">
        <div class="container mx-auto text-center">
            <p class="text-gray-300">&copy; 2024 LeafletPro Farmasi. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>

</html>