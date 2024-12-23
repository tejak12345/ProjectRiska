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

    <!-- Main Content -->
    <div class="container mx-auto px-4 pt-28">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Modern Sidebar -->
            <div class="lg:col-span-1">
                <div class="sidebar p-6 sticky top-28">
                    <div class="space-y-3">
                        <a href="/dashboard" class="sidebar-link flex items-center p-4 hover:bg-blue-50">
                            <i data-lucide="layout-dashboard" class="w-5 h-5 mr-4"></i>
                            <span class="font-medium">Dashboard</span>
                        </a>
                        <a href="/produk" class="sidebar-link active flex items-center p-4">
                            <i data-lucide="file-text" class="w-5 h-5 mr-4"></i>
                            <span class="font-medium">Produk</span>
                        </a>
                        <a href="<?= base_url("pesanan") ?>"
                            class="sidebar-link flex items-center p-4 hover:bg-blue-50">
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