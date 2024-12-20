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
                    <a href="/dashboard" class="flex items-center hover:bg-blue-50 p-3 rounded-lg">
                        <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/produk" class="flex items-center text-[#0F4C75] font-semibold bg-blue-50 p-3 rounded-lg">
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
                    <a href="/profile" class="flex items-center hover:bg-blue-50 p-3 rounded-lg">
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

        <!-- Produk Section -->
        <div class="col-span-2">
            <h1 class="text-2xl font-bold text-gray-700 mb-6">Our Products</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Looping Produk -->
                <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <?php if ($product['image'] && file_exists(ROOTPATH . '/public/img/products/' . $product['image'])): ?>
                    <img src="<?= base_url('/img/products/' . $product['image']) ?>" alt="<?= esc($product['name']) ?>"
                        class="product-image">
                    <?php else: ?>
                    <div class="product-image bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                    <?php endif; ?>
                    <div class="product-info">
                        <h3 class="product-name"><?= esc($product['name']) ?></h3>
                        <p class="product-price">Rp <?= esc(number_format($product['price'], 0, ',', '.')) ?></p>
                        <p class="product-description"><?= esc($product['description']) ?></p>
                        <div class="button-group">
                            <button
                                onclick="openModal('<?= esc($product['name']) ?>', 'Rp <?= esc(number_format($product['price'], 0, ',', '.')) ?>', '<?= esc($product['description']) ?>')"
                                class="btn-detail">Detail</button>
                            <a href="/produk/beli/<?= $product['id'] ?>" class="btn-buy">Beli</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Modal untuk Detail Produk -->
    <div id="productModal" class="fixed inset-0 flex justify-center items-center bg-gray-700 bg-opacity-50">
        <div class="bg-white rounded-lg w-96 p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800" id="modalProductName">Nama Produk</h2>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>
            <p class="text-blue-600 font-semibold mt-2" id="modalProductPrice">Rp 0</p>
            <p class="text-gray-600 mt-4" id="modalProductDescription">Detail Produk...</p>
            <div class="mt-6 flex justify-center space-x-4"></div>
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
</body>

</html>