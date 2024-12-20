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
        /* Menambahkan "..." jika teks terpotong */
        white-space: nowrap;
        /* Menghindari teks untuk membungkus ke baris baru */
        font-weight: bold;
        font-size: 1.125rem;
        /* Ukuran font yang lebih besar untuk nama produk */
        color: #2d3748;
        /* Warna teks */
        max-width: 100%;
        /* Menjaga teks agar sesuai dengan lebar container */
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

    <!-- Modal untuk Detail Produk -->
    <div id="productModal" class="fixed inset-0 flex justify-center items-center bg-gray-700 bg-opacity-50">
        <div class="bg-white rounded-lg w-96 p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800" id="modalProductName">Nama Produk</h2>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>
            <p class="text-blue-600 font-semibold mt-2" id="modalProductPrice">Rp 0</p>
            <p class="text-gray-600 mt-4" id="modalProductDescription">Detail Produk...</p>
            <div class="mt-6 flex justify-center space-x-4">
                <!-- <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">Detail</a>
                <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">Beli</a> -->
            </div>
        </div>
    </div>

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

            <!-- Produk Section -->
            <div class="col-span-2">
                <h1 class="text-2xl font-bold text-gray-700 mb-6">Our Products</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Looping Produk -->
                    <?php foreach ($products as $product): ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <!-- Gambar Produk -->
                        <?php if ($product['image'] && file_exists(ROOTPATH . '/public/img/products/' . $product['image'])): ?>
                        <img src="<?= base_url('/img/products/' . $product['image']) ?>"
                            alt="<?= esc($product['name']) ?>" class="w-full h-40 object-cover">
                        <?php else: ?>
                        <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                        <?php endif; ?>

                        <!-- Detail Produk -->
                        <div class="p-4">
                            <h3 class="product-name"><?= esc($product['name']) ?></h3> <!-- Nama Produk -->
                            <p class="text-blue-600 font-semibold">Rp
                                <?= esc(number_format($product['price'], 0, ',', '.')) ?></p>
                            <p class="text-gray-600 text-sm mb-4"><?= esc($product['description']) ?></p>

                            <!-- Tombol Aksi -->
                            <div class="flex justify-between items-center">
                                <!-- Tombol Detail yang memanggil fungsi openModal -->
                                <button
                                    onclick="openModal('<?= esc($product['name']) ?>', 'Rp <?= esc(number_format($product['price'], 0, ',', '.')) ?>', '<?= esc($product['description']) ?>')"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">Detail</button>
                                <a href="/produk/beli/<?= $product['id'] ?>"
                                    class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">Beli</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Fungsi untuk membuka modal dan menampilkan detail produk
    function openModal(productName, productPrice, productDescription) {
        // Set data produk pada modal
        document.getElementById('modalProductName').textContent = productName;
        document.getElementById('modalProductPrice').textContent = productPrice;
        document.getElementById('modalProductDescription').textContent = productDescription;

        // Tampilkan modal
        document.getElementById('productModal').classList.remove('hidden');
    }

    // Menutup modal
    document.getElementById('closeModal').onclick = function() {
        document.getElementById('productModal').classList.add('hidden');
    }
    </script>
</body>

</html>