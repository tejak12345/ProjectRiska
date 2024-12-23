<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - LeafletPro Farmasi</title>
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
                        <p class="text-blue-200 text-sm capitalize"><?= session()->get("role"); ?></p>
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
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-blue-50 transition">
                                <i data-lucide="message-circle" class="w-5 h-5 mr-3 text-gray-600"></i>
                                <span>Konsultasi</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-blue-50 transition">
                                <i data-lucide="user" class="w-5 h-5 mr-3 text-gray-600"></i>
                                <span>Profil Saya</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Detail Product Content -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <!-- Back Button & Title -->
                    <div class="p-6 border-b">
                        <div class="flex items-center space-x-4">
                            <a href="<?= base_url('produk') ?>" class="text-gray-600 hover:text-[#0F4C75] transition">
                                <i data-lucide="arrow-left" class="w-6 h-6"></i>
                            </a>
                            <h2 class="text-2xl font-bold text-[#0F4C75]"><?= $produk['nama'] ?></h2>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Product Images -->
                            <div class="space-y-4">
                                <div class="aspect-w-4 aspect-h-3 rounded-xl overflow-hidden shadow-lg">
                                    <img src="<?= $produk['gambar'] ?>" alt="<?= $produk['nama'] ?>"
                                        class="w-full h-full object-cover">
                                </div>
                                <div class="grid grid-cols-4 gap-4">
                                    <img src="<?= $produk['gambar'] ?>" alt="Thumbnail"
                                        class="rounded-lg cursor-pointer shadow hover:shadow-md transition">
                                    <img src="<?= $produk['gambar'] ?>" alt="Thumbnail"
                                        class="rounded-lg cursor-pointer shadow hover:shadow-md transition">
                                    <img src="<?= $produk['gambar'] ?>" alt="Thumbnail"
                                        class="rounded-lg cursor-pointer shadow hover:shadow-md transition">
                                    <img src="<?= $produk['gambar'] ?>" alt="Thumbnail"
                                        class="rounded-lg cursor-pointer shadow hover:shadow-md transition">
                                </div>
                            </div>

                            <!-- Product Info -->
                            <div class="space-y-6">
                                <div class="pb-6 border-b">
                                    <p class="text-2xl font-bold text-[#1A73E8] mb-2">Rp
                                        <?= number_format($produk['harga'], 0, ',', '.') ?></p>
                                    <p class="text-gray-600"><?= $produk['deskripsi'] ?></p>
                                </div>

                                <!-- Size Selection -->
                                <div>
                                    <label class="block text-sm font-semibold text-[#0F4C75] mb-3">Ukuran</label>
                                    <div class="flex flex-wrap gap-3">
                                        <button
                                            class="px-6 py-2 rounded-lg bg-blue-50 text-[#0F4C75] font-medium hover:bg-blue-100 transition">A4</button>
                                        <button
                                            class="px-6 py-2 rounded-lg bg-blue-50 text-[#0F4C75] font-medium hover:bg-blue-100 transition">A5</button>
                                        <button
                                            class="px-6 py-2 rounded-lg bg-blue-50 text-[#0F4C75] font-medium hover:bg-blue-100 transition">Custom</button>
                                    </div>
                                </div>

                                <!-- Quantity -->
                                <div>
                                    <label class="block text-sm font-semibold text-[#0F4C75] mb-3">Jumlah</label>
                                    <div class="flex items-center w-32">
                                        <button
                                            class="px-4 py-2 bg-gray-100 rounded-l-lg hover:bg-gray-200 transition">-</button>
                                        <input type="number" value="1" min="1"
                                            class="w-full px-3 py-2 text-center border-y bg-white">
                                        <button
                                            class="px-4 py-2 bg-gray-100 rounded-r-lg hover:bg-gray-200 transition">+</button>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="pt-6">
                                    <a href="<?= base_url('checkout/' . $produk['id']) ?>" class="inline-block w-full">
                                        <button
                                            class="w-full bg-[#1A73E8] text-white py-3 px-6 rounded-lg hover:bg-[#0F4C75] transition font-semibold">
                                            Beli Sekarang
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Product Description -->
                        <div class="mt-12 pt-6 border-t">
                            <h3 class="text-xl font-semibold text-[#0F4C75] mb-4">Deskripsi Produk</h3>
                            <div class="prose prose-blue max-w-none">
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    Leaflet Informasi Vaksin ini dirancang khusus untuk memberikan informasi yang
                                    komprehensif
                                    dan mudah dipahami tentang vaksinasi. Desain profesional dengan tata letak yang
                                    jelas
                                    membantu menyampaikan informasi kunci seperti:
                                </p>
                                <ul class="space-y-2 text-gray-600 list-disc pl-5">
                                    <li>Jenis Vaksin yang tersedia dan karakteristiknya</li>
                                    <li>Manfaat dan Efektivitas setiap jenis vaksin</li>
                                    <li>Prosedur Vaksinasi yang aman dan sesuai standar</li>
                                    <li>Informasi Kesehatan Penting terkait vaksinasi</li>
                                </ul>
                            </div>
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

        // Quantity Input Handler
        const quantityInput = document.querySelector('input[type="number"]');
        const decrementBtn = quantityInput.previousElementSibling;
        const incrementBtn = quantityInput.nextElementSibling;

        decrementBtn.addEventListener('click', () => {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        incrementBtn.addEventListener('click', () => {
            const currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });
    });
    </script>
</body>

</html>