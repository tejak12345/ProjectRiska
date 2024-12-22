<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - LeafletPro Farmasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/lucide-static@0.321.0/font/lucide.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hover-zoom {
            transition: transform 0.3s ease;
        }

        .hover-zoom:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-blue-900 to-blue-700 text-white p-4 shadow-lg fixed top-0 w-full z-50">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <i data-lucide="file-text" class="w-8 h-8"></i>
                <h1 class="text-xl font-bold">LeafletPro Farmasi</h1>
            </div>
            <div class="flex items-center space-x-6">
                <div class="relative">
                    <button class="hover:text-blue-200 transition-all duration-200">
                        <i data-lucide="bell" class="w-6 h-6"></i>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center animate-pulse">3</span>
                    </button>
                </div>
                <div class="flex items-center space-x-3 bg-white/10 rounded-lg p-2">
                    <img src="/api/placeholder/40/40" alt="Profil" class="rounded-full w-10 h-10 border-2 border-white/30">
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
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 pt-24">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-md p-6 sticky top-24">
                    <ul class="space-y-2">
                        <li>
                            <a href="<?= base_url('customer') ?>"
                                class="flex items-center p-3 rounded-lg hover:bg-blue-50 transition">
                                <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3 text-gray-600"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('produk') ?>"
                                class="flex items-center p-3 rounded-lg bg-blue-50 text-[#0F4C75] font-semibold">
                                <i data-lucide="file-text" class="w-5 h-5 mr-3"></i>
                                <span>Produk</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url("pesanan") ?>" class="flex items-center p-3 rounded-lg hover:bg-blue-50 transition">
                                <i data-lucide="shopping-cart" class="w-5 h-5 mr-3 text-gray-600"></i>
                                <span>Pesanan Saya</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url("customer/profile") ?>" class="flex items-center p-3 rounded-lg hover:bg-blue-50 transition">
                                <i data-lucide="user" class="w-5 h-5 mr-3 text-gray-600"></i>
                                <span>Profil Saya</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Product Details -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-xl shadow-lg p-6">
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
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Product Image Section -->
                        <div class="space-y-4">
                            <div class="aspect-square rounded-lg overflow-hidden bg-gray-100">
                                <img src="/img/products/<?= $product["image"] ?>" alt="Product Image" class="w-full h-full object-cover hover-zoom">
                            </div>
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h3 class="font-semibold text-blue-800 mb-2">Deskripsi Produk</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    <?= $product["description"] ?>
                                </p>
                            </div>
                        </div>

                        <!-- Order Form -->
                        <div class="space-y-6">
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800"><?= $product["name"] ?></h2>
                                <p class="text-3xl font-bold text-blue-700 mt-2">Rp. <?= esc(number_format($product['price'], 0, ',', '.')) ?></p>
                            </div>

                            <form class="space-y-4" id="orderForm" action="/prosescheckout/<?= $product["id"] ?>" method="POST">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Username
                                    </label>
                                    <input type="text" name="username" value=<?= $user["username"] ?> required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Email
                                    </label>
                                    <input type="email" name="email" value=<?= $user["email"] ?> required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Kuantitas
                                        </label>
                                        <input type="number" name="kuantitas" value="1" min="1" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Metode Pembayaran
                                        </label>
                                        <select name="metode_pembayaran" id="metode_pembayaran"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                            <option value="Cash">Cash</option>
                                            <option value="Transfer Bank">Transfer Bank</option>
                                        </select>
                                    </div>
                                </div>


                                <div id="bankSelection" class="hidden animate-fade-in">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Pilih Bank
                                    </label>
                                    <select name="pilih_bank"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                        <option value="BRI">BRI</option>
                                        <option value="BCA">BCA</option>
                                    </select>
                                </div>

                                <button type="submit"
                                    class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transform transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Pesan Sekarang
                                </button>
                            </form>
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

            // Payment method selection handler
            const metodePembayaran = document.getElementById('metode_pembayaran');
            const bankSelection = document.getElementById('bankSelection');

            metodePembayaran.addEventListener('change', (e) => {
                if (e.target.value === 'Transfer Bank') {
                    bankSelection.classList.remove('hidden');
                } else {
                    bankSelection.classList.add('hidden');
                }
            });

        });

    </script>
</body>
</html>