<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - LeafletPro Farmasi</title>
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

    <!-- Sidebar -->
    <div class="flex h-screen bg-[#0F4C75] text-white">
        <div class="w-64 p-6">
            <div class="flex items-center space-x-3 mb-8">
                <i data-lucide="file-text" class="w-12 h-12 text-white"></i>
                <h1 class="text-2xl font-bold tracking-tight">LeafletPro Farmasi</h1>
            </div>
            <ul class="space-y-6 text-lg">
                <li><a href="#" class="flex items-center hover:bg-blue-500 p-2 rounded-md"><i data-lucide="home"
                            class="w-6 h-6 mr-3"></i> Dashboard</a></li>
                <li><a href="#customers" class="flex items-center hover:bg-blue-500 p-2 rounded-md"><i
                            data-lucide="users" class="w-6 h-6 mr-3"></i> Pelanggan</a></li>
                <li><a href="#orders" class="flex items-center hover:bg-blue-500 p-2 rounded-md"><i
                            data-lucide="clipboard" class="w-6 h-6 mr-3"></i> Pesanan</a></li>
                <li><a href="#settings" class="flex items-center hover:bg-blue-500 p-2 rounded-md"><i
                            data-lucide="settings" class="w-6 h-6 mr-3"></i> Pengaturan</a></li>
                <li><a href="/auth/logout" class="flex items-center hover:bg-blue-500 p-2 rounded-md"><i
                            data-lucide="log-out" class="w-6 h-6 mr-3"></i> Keluar</a></li>
            </ul>
        </div>

        <!-- Content Area -->
        <div class="flex-1 p-6">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-[#0F4C75]">Halo, Admin</h2>
                <button
                    class="bg-[#1A73E8] text-white px-6 py-2 rounded-full flex items-center justify-center shadow-md hover:bg-[#0F4C75] transition">
                    <i data-lucide="bell" class="mr-2 w-5 h-5"></i> Notifikasi
                </button>
            </div>

            <!-- Dashboard Sections -->

            <!-- Pelanggan Section -->
            <section id="customers" class="mb-12">
                <h3 class="text-2xl font-semibold text-[#0F4C75] mb-4">Daftar Pelanggan</h3>
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="border-b">
                                <th class="px-4 py-2 text-left">ID Pelanggan</th>
                                <th class="px-4 py-2 text-left">Nama</th>
                                <th class="px-4 py-2 text-left">Email</th>
                                <th class="px-4 py-2 text-left">Telepon</th>
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="px-4 py-2">#001</td>
                                <td class="px-4 py-2">John Doe</td>
                                <td class="px-4 py-2">johndoe@mail.com</td>
                                <td class="px-4 py-2">081234567890</td>
                                <td class="px-4 py-2">
                                    <button
                                        class="bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-600 transition">Edit</button>
                                    <button
                                        class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition ml-2">Hapus</button>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-4 py-2">#002</td>
                                <td class="px-4 py-2">Jane Smith</td>
                                <td class="px-4 py-2">janesmith@mail.com</td>
                                <td class="px-4 py-2">082345678901</td>
                                <td class="px-4 py-2">
                                    <button
                                        class="bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-600 transition">Edit</button>
                                    <button
                                        class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition ml-2">Hapus</button>
                                </td>
                            </tr>
                            <!-- Add more customers here -->
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Pesanan Section -->
            <section id="orders" class="mb-12">
                <h3 class="text-2xl font-semibold text-[#0F4C75] mb-4">Daftar Pesanan</h3>
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="border-b">
                                <th class="px-4 py-2 text-left">ID Pesanan</th>
                                <th class="px-4 py-2 text-left">Nama Pelanggan</th>
                                <th class="px-4 py-2 text-left">Tanggal</th>
                                <th class="px-4 py-2 text-left">Status</th>
                                <th class="px-4 py-2 text-left">Total</th>
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="px-4 py-2">#12345</td>
                                <td class="px-4 py-2">John Doe</td>
                                <td class="px-4 py-2">01-01-2024</td>
                                <td class="px-4 py-2 text-yellow-500">Proses</td>
                                <td class="px-4 py-2">Rp 750.000</td>
                                <td class="px-4 py-2">
                                    <button
                                        class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition">Lihat</button>
                                    <button
                                        class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600 transition ml-2">Selesaikan</button>
                                    <button
                                        class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition ml-2">Hapus</button>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-4 py-2">#12346</td>
                                <td class="px-4 py-2">Jane Smith</td>
                                <td class="px-4 py-2">05-01-2024</td>
                                <td class="px-4 py-2 text-green-500">Selesai</td>
                                <td class="px-4 py-2">Rp 1.200.000</td>
                                <td class="px-4 py-2">
                                    <button
                                        class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition">Lihat</button>
                                    <button
                                        class="bg-gray-500 text-white px-4 py-2 rounded-full hover:bg-gray-600 transition ml-2"
                                        disabled>Selesai</button>
                                    <button
                                        class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition ml-2">Hapus</button>
                                </td>
                            </tr>
                            <!-- Add more orders here -->
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Pengaturan Section -->

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>

</html>